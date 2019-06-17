<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class NodeActivity extends Model
{
    private $nodeId;
    private $type;
    private $datetime;

    public function __construct($nodeId, $type, $datetime)
    {
        $this->nodeId = $nodeId;
        $this->type = $type;
        $this->datetime = $datetime;
    }
}