<?php

namespace App\Http\Controllers;

use App\NodeActivity;
use App\Temperature;
use Carbon\Carbon;
Use Illuminate\Http\Request;

class DataController extends Controller
{
    public function recordData(Request $request)
    {
        $datetime = Carbon::now();

        $this->recordActivity($request, $datetime);
        $this->recordTemperature($request, $datetime);


        return response()->json([
            'status' => 200,
            'data' => [],
            'error' => []
        ]);
    }

    private function recordActivity(Request $request, Carbon $datetime)
    {
        $nodeActivity = new NodeActivity(
            $request->input('nodeId'),
            $request->method(),
            $datetime->toDateTimeString()
        );

        $nodeActivity->save();

        return true;
    }

    private function recordTemperature(Request $request, Carbon $datetime)
    {
        $temperature = new Temperature(
            $request->input('temperature'),
            $request->input('nodeId'),
            $datetime->toDateTimeString()
        );
        $temperature->save();

        return true;
    }
}