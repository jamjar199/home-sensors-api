<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    private $temperature;
    private $node_id;
    private $datetime;

    function getTemperature()
    {
        return $this->temperature;
    }
}