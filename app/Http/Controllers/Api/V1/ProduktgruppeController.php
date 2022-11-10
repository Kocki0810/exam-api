<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreproduktgruppeRequest;
use App\Http\Requests\UpdateproduktgruppeRequest;
use App\Models\produktgruppe;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProduktgruppeResource;
use App\Http\Resources\V1\ProduktgruppeCollection;

use Illuminate\Http\Request;
use App\Filters\V1\ProduktgruppeFilter;

class ProduktgruppeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new ProduktgruppeFilter();
        $query = $filter->transform($request);
        $queryItems = $query['dataCollection'];
        $includes = $query['includeCollection'];

        if(count($includes) == 0)
        {
            $produkt = produktgruppe::where($queryItems);
        }
        else
        {
            $produkt = produktgruppe::where($queryItems)->with($includes);
        }
        
        return new ProduktgruppeCollection($produkt->get());
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
     * @param  \App\Http\Requests\StoreproduktgruppeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproduktgruppeRequest $request)
    {
        $insertedRows = [];
        $data = collect($request->all());
        foreach($data as $column)
        {
            $newColumn = new ProduktgruppeResource(produktgruppe::create($column));
            $insertedRows[] = $newColumn->id;
        }

        return $insertedRows;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\produktgruppe  $produktgruppe
     * @return \Illuminate\Http\Response
     */
    public function show(produktgruppe $produktgruppe)
    {
        return new ProduktgruppeResource($produktgruppe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\produktgruppe  $produktgruppe
     * @return \Illuminate\Http\Response
     */
    public function edit(produktgruppe $produktgruppe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproduktgruppeRequest  $request
     * @param  \App\Models\produktgruppe  $produktgruppe
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateproduktgruppeRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            produktgruppe::where("id", $column['id'])->update($column);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\produktgruppe  $produktgruppe
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateproduktgruppeRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            produktgruppe::where("id", $column['id'])->delete($column);
        }
    }
}
