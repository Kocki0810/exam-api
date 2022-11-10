<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreproduktRequest;
use App\Http\Requests\UpdateproduktRequest;
use App\Models\produkt;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProduktResource;
use App\Http\Resources\V1\ProduktCollection;

use Illuminate\Http\Request;
use App\Filters\V1\ProduktFilter;

class ProduktController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new ProduktFilter();
        $query = $filter->transform($request);
        $queryItems = $query['dataCollection'];
        $includes = $query['includeCollection'];

        if(count($includes) == 0)
        {
            $produkt = produkt::where($queryItems);
        }
        else
        {
            $produkt = produkt::where($queryItems)->with($includes);
        }
        
        return new ProduktCollection($produkt->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproduktRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproduktRequest $request)
    {
        $insertedRows = [];
        $data = collect($request->all());
        foreach($data as $column)
        {
            $newColumn = new ProduktResource(produkt::create($column));
            $insertedRows[] = $newColumn->id;
        }

        return $insertedRows;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function show(produkt $produkt)
    {
        return new ProduktResource($produkt);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function edit(produkt $produkt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproduktRequest  $request
     * @param  \App\Models\produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproduktRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            produkt::where("id", $column['id'])->update($column);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produkt  $produkt
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateproduktRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            produkt::where("id", $column['id'])->delete($column);
        }
    }
}
