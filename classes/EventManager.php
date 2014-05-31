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

    public static function GetMicroData($data, $tag)
    { 	
    	switch($tag)
    	{
    		case "summary":    			
	    		return "<span itemprop='summary'>$data</span>";
    		case "description":
	    		return "<span itemprop='description'>$data</span>";
	    	case "location":
	    		$lat = $data[0];
	    		$lng = $data[1];
	    		return "<span itemprop='geo' itemscope itemtype='http://data-vocabulary.org/​Geo'><meta itemprop='latitude' content='$lat' /><meta itemprop='longitude' content='$lng' /></span>";
    	}
    }
}