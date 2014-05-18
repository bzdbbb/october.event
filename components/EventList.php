<?php namespace bzdbbb\Event\Components;

use Cms\Classes\ComponentBase;
use bzdbbb\Event\Models\Event;
use DB as Db;

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
        return [
        'filter' => [
            'title'             => 'Filter',
            'type'              => 'dropdown',
            'default'           => 'All',
            'placeholder'       => 'Select filter',
            'options'           => ["All" => "All"]
            ],
        'max' => [
                'description'       => 'The most amount of event items allowed',
                'title'             => 'Max items',
                'default'           => 5,
                'type'              => 'string',
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'The Max Items value is required and should be integer.'
            ]
        ];
    }

    public function events()
    {
        return Event::all();
    }
}