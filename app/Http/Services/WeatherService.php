<?php
namespace App\Http\Services;

use App\Models\Weather;
use Illuminate\Support\Facades\Log;

class WeatherService {
    public static function storeWeather($request){
        try{
            $request->validate([
                'city'=>'required|string',
                'weather'=>'required',
                'temperature'=>'required',
                'tomorrow_temp'=>'required|numeric'
            ]);
            $weather=Weather::create([
                'city'=>$request->city,
                'weather'=>$request->weather,
                'temperature'=>$request->temperature,
                'tomorrow_temp'=>$request->tomorrow_temp
            ]);
        }
        catch(\Exception $e ){
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());
            return response()->json(['message'=>'Server Error '],500);

        }
        // dd($weather);
        return response()->json(['message'=>'Data added',"data"=>$weather],201);
    }
}
