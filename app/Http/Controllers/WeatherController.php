<?php

namespace App\Http\Controllers;

use App\Http\Services\WeatherService;
use App\Models\Weather;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WeatherController extends Controller
{
    //
    public function getWeather($city){
        $weather=Weather::where('city',$city)->first();
        if(!$weather){
            return response()->json([
                'message'=>'City not found',
            ]);
        }
        return response()->json($weather);
    }
    public function storeWeather(Request $request){
        //   dd($request->all());
    return WeatherService::storeWeather($request);

    }
}
