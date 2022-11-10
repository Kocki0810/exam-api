<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Requests\StorebrugerRequest;
use App\Http\Requests\UpdatebrugerRequest;
use App\Models\bruger;
use App\Http\Resources\V1\BrugerResource;
use App\Http\Resources\V1\BrugerCollection;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Filters\V1\BrugerFilter;

class BrugerController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = new BrugerFilter();
        $query = $filter->transform($request);
        $queryItems = $query['dataCollection'];
        $includes = $query['includeCollection'];
        
        
        if(isset($request->get('email')['eq']))
        {
            $password = $request->get('password')['eq'];
            $email = $request->get('email')['eq'];
            $bruger = bruger::where('email', $email);
            if(isset($bruger->pluck("password")[0]))
            {
                $hashedPassword = $bruger->pluck("password")[0];
                if(!Hash::check($password, $hashedPassword))
                {
                    return [];
                }
            }
        }
        elseif(count($includes) == 0)
        {
            $bruger = bruger::where($queryItems);
        }
        else
        {
            $bruger = bruger::where($queryItems)->with($includes);
        }
        return new BrugerCollection($bruger->get());
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
     * @param  \App\Http\Requests\StorebrugerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebrugerRequest $request)
    {
        $insertedRows = [];
        $data = collect($request->all());
        foreach($data["data"] as $column)
        {
            $column["password"] = Hash::make($column["password"]);
            $newColumn = new BrugerResource(bruger::create($column));
            $insertedRows[] = $newColumn->id;
        }
        return $insertedRows;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bruger  $bruger
     * @return \Illuminate\Http\Response
     */
    public function show(bruger $bruger)
    {
        return new BrugerResource($bruger);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bruger  $bruger
     * @return \Illuminate\Http\Response
     */
    public function edit(bruger $bruger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebrugerRequest  $request
     * @param  \App\Models\bruger  $bruger
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebrugerRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            $column["password"] = Hash::make($column["password"]);
            bruger::where("id", $column['id'])->update($column);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bruger  $bruger
     * @return \Illuminate\Http\Response
     */
    public function destroy(UpdatebrugerRequest $request)
    {
        $data = collect($request->all());
        foreach($data as $column)
        {
            bruger::where("id", $column['id'])->delete($column);
        }
    }
}
