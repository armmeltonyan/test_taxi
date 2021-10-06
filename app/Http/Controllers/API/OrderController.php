<?php

namespace App\Http\Controllers\API;

use App\Order;
use App\Tarif;
use Illuminate\Http\Request;
use App\Http\Requests\OrdersRequest;
use App\Services\OrderService;
use App\Http\Controllers\API\ResponseController as ResponseController;

class OrderController extends ResponseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return $this->sendResponse($orders->toArray(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrdersRequest $request)
    {
        $tarif = Tarif::findOrFail($request->tarif_id);
        $final_price = OrderService::calculatePrice($request->coordinate_from,$request->coordinate_to,$tarif);
        $order = $request->validated();
        $order['min_price']     = $tarif->min_price;
        $order['price_by_km']   = $tarif->price_per_km;
        $order['price_by_minute']   = $tarif->price_per_minute;
        $order['final_price']   =   $final_price;

        $response = Order::create($order);

        return $this->sendResponse($response->toArray(), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return $this->sendResponse($order->toArray(), 200);
    }

}
