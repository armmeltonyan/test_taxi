<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class OrderService
{
	public static function calculatePrice($from,$to,$tarif)
	{
		$client = new \GuzzleHttp\Client();
		
		try {
			$response = $client->request('GET', 'https://routing.openstreetmap.de/routed-car/route/v1/driving/'.$from.';'.$to, []);
            $response = json_decode($response->getBody()->getContents());
			$distance = $response->routes[0]->distance;
			$duration = $response->routes[0]->duration;
			$price_by_duration = ($duration-$tarif->free_minute_count)*$tarif->price_per_minute;
			$price_by_km = ($distance-$tarif->free_km_count)*$tarif->price_per_km;
			$price = $price_by_duration+$price_by_km+$tarif->min_price;

			return $price;
        } catch (\Exception $e) {
            Log::error('CallculateDistanceERROR: '.$e->getMessage());
        }
		
	}
}