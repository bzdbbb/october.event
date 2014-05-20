<?php namespace bzdbbb\Event\Classes;

use Cms\Classes\ComponentBase;
use bzdbbb\Event\Models\Event;
use DB as Db;

class EventManager
{
    public static function GetQualityFromId($id, $item)
    {
        return Event::find($id)[$item];
    }
}