<?php

namespace App\Http\Controllers\API;

use App\Driver;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDriverRequest;
use App\Http\Requests\UpdateDriverRequest;
use App\Http\Controllers\API\ResponseController as ResponseController;

class DriverController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::all();

        return $this->sendResponse($drivers->toArray(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        $driver = Driver::create($request->validated());

        return $this->sendResponse($driver->toArray(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        return $this->sendResponse($driver->toArray(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverRequest $request, Driver $driver)
    {   
        $driver->fill($request->validated());
        $driver->save();

        return $this->sendResponse($driver->toArray(), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return $this->sendResponse([], 200);
    }
}
