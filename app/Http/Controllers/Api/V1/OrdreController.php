<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreordreRequest;
use App\Http\Requests\UpdateordreRequest;
use App\Models\ordre;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\OrdreResource;
use App\Http\Resources\V1\OrdreCollection;

use Illuminate\Http\Request;
use App\Filters\V1\OrdreFilter;
class OrdreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $filter = new OrdreFilter();
        $query = $filter->transform($request);
        $queryItems = $query['dataCollection'];
        $includes = $query['includeCollection'];

        if(count($includes) == 0)
        {
            $ordre = ordre::where($queryItems);
        }
        else
        {
            $ordre = ordre::where($queryItems)->with($includes);
        }
        
        return new OrdreCollection($ordre->get());
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
     * @param  \App\Http\Requests\StoreordreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreordreRequest $request)
    {
        $insertedRows = [];
        $data = collect($request->all());
        foreach($data as $column)
        {
            $newColumn = new OrdreResource(ordre::create($column));
            $insertedRows[] = $newColumn->id;
        }

        return $insertedRows;   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ordre  $ordre
     * @return \Illuminate\Http\Response
     */
    public function show(ordre $ordre)
    {
        return new OrdreResource($ordre);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ordre  $ordre
     * @return \Illuminate\Http\Response
     */
    public function edit(ordre $ordre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateordreRequest  $request
     * @param  \App\Models\ordre  $ordre
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateordreRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            ordre::where("id", $column['id'])->update($column);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ordre  $ordre
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateordreRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            ordre::where("id", $column['id'])->delete($column);
        }
    }
}
