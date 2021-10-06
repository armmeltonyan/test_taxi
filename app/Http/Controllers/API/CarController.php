<?php

namespace App\Http\Controllers\API;

use App\Car;
use Illuminate\Http\Request;
use App\Http\Requests\CarsRequest;
use App\Http\Controllers\API\ResponseController as ResponseController;

class CarController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();

        return $this->sendResponse($cars->toArray(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsRequest $request)
    {
        $cars = Car::create($request->validated());

        return $this->sendResponse($cars->toArray(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return $this->sendResponse($car->toArray(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $car->fill($request->all());
        $car->save();
        
        return $this->sendResponse($car->toArray(), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return $this->sendResponse([], 204);
    }

    public function addTarif($id, Request $request)
    {
        $car = Car::findOrFail($id);
        $car->tarifs()->sync($request->tarif_id, false);
        $response = Car::with('tarifs')->findOrFail($id);

        return $this->sendResponse($response, 200);
    }
}
