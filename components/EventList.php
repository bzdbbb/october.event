<?php namespace Bzdbbb\Event\Components;

use Cms\Classes\ComponentBase;
use Bzdbbb\Event\Models\Event;

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