<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

use App\Http\Requests\StorefirmaRequest;
use App\Http\Requests\UpdatefirmaRequest;
use App\Http\Resources\V1\FirmaResource;
use App\Http\Resources\V1\FirmaCollection;
use App\Http\Controllers\Controller;

use App\Models\firma;
use App\Filters\V1\FirmaFilter;

class FirmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new FirmaFilter();
        $query = $filter->transform($request);
        $queryItems = $query['dataCollection'];
        $includes = $query['includeCollection'];

        if(count($includes) == 0)
        {
            $firma = firma::where($queryItems);
        }
        else
        {
            $firma = firma::where($queryItems)->with($includes);
        }
        
        return new FirmaCollection($firma->get());
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
     * @param  \App\Http\Requests\StorefirmaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefirmaRequest $request)
    {
        $insertedRows = [];
        $data = collect($request->all());
        foreach($data as $column)
        {
            $newColumn = new FirmaResource(firma::create($column));
            $insertedRows[] = $newColumn->id;
        }

        return $insertedRows;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function show(firma $firma)
    {
        return new FirmaResource($firma);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function edit(firma $firma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefirmaRequest  $request
     * @param  \App\Models\firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefirmaRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            firma::where("id", $column['id'])->update($column);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdatefirmaRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            firma::where("id", $column['id'])->delete($column);
        }
    }
}
