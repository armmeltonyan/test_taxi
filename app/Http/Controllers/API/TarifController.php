<?php

namespace App\Http\Controllers\API;

use App\Tarif;
use Illuminate\Http\Request;
use App\Http\Requests\TarifRequest;
use App\Http\Requests\UpdateTarifRequest;
use App\Http\Controllers\API\ResponseController as ResponseController;

class TarifController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifs = Tarif::all();

        return $this->sendResponse($tarifs->toArray(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarifRequest $request)
    {
        $tarif = Tarif::create($request->validated());

        return $this->sendResponse($tarif->toArray(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function show(Tarif $tarif)
    {
        return $this->sendResponse($tarif->toArray(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTarifRequest $request, Tarif $tarif)
    {
        $tarif->fill($request->validated());
        $tarif->save();
        
        return $this->sendResponse($tarif->toArray(), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarif  $tarif
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarif $tarif)
    {
        $tarif->delete();

        return $this->sendResponse([], 204);
    }
}
