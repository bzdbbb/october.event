<?php namespace bzdbbb\Event\Components;

use Cms\Classes\ComponentBase;
use bzdbbb\Event\Models\Event;

class EventList extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'EventList Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function events()
    {
        return Event::all();
    }
}