<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreekspedientRequest;
use App\Http\Requests\UpdateekspedientRequest;
use App\Models\ekspedient;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EkspedientResource;
use App\Http\Resources\V1\EkspedientCollection;

use Illuminate\Http\Request;
use App\Filters\V1\EkspedientFilter;



class EkspedientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new EkspedientFilter();
        $query = $filter->transform($request);
        $queryItems = $query['dataCollection'];
        $includes = $query['includeCollection'];
        
        if(count($includes) == 0)
        {
            $ekspedient = ekspedient::where($queryItems);
        }
        else
        {
            $ekspedient = ekspedient::where($queryItems)->with($includes);
        }
        
        return new EkspedientCollection($ekspedient->get());
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
     * @param  \App\Http\Requests\StoreekspedientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreekspedientRequest $request)
    {
        $insertedRows = [];
        $data = collect($request->all());
        foreach($data as $column)
        {
            $newColumn = new EkspedientResource(ekspedient::create($column));
            $insertedRows[] = $newColumn->id;
        }

        return $insertedRows;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ekspedient  $ekspedient
     * @return \Illuminate\Http\Response
     */
    public function show(ekspedient $ekspedient)
    {
        return new EkspedientResource($ekspedient);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ekspedient  $ekspedient
     * @return \Illuminate\Http\Response
     */
    public function edit(ekspedient $ekspedient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateekspedientRequest  $request
     * @param  \App\Models\ekspedient  $ekspedient
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateekspedientRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            ekspedient::where("id", $column['id'])->update($column);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ekspedient  $ekspedient
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdateekspedientRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            ekspedient::where("id", $column['id'])->delete($column);
        }
    }
}
