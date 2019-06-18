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
        $nodeActivity = new NodeActivity;
        $nodeActivity->node_id = $request->input('node_id');
        $nodeActivity->request = $request->method();
        $nodeActivity->datetime = $datetime->toDateTimeString();

        $nodeActivity->save();

        return true;
    }

    private function recordTemperature(Request $request, Carbon $datetime)
    {
        $temperature = new Temperature;
        $temperature->temperature = $request->input('temperature');
        $temperature->node_id = $request->input('node_id');
        $temperature->datetime = $datetime->toDateTimeString();

        $temperature->save();

        return true;
    }
}