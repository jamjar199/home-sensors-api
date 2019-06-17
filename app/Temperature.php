<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    private $temperature;
    private $nodeId;
    private $datetime;

    function __construct($temperature, $nodeId, $datetime)
    {
        $this->temperature = $temperature;
        $this->nodeId = $nodeId;
        $this->datetime = $datetime;
    }

    function getTemperature()
    {
        return $this->temperature;
    }
}