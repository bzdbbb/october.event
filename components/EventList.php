<?php namespace bzdbbb\Event\Components;

require 'vendor/autoload.php';

use Cms\Classes\ComponentBase;
use bzdbbb\Event\Models\Event;
use DB as Db;
use lessc as LessC;

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
            ],
        'route' => [
                'description'       => 'The path to redirect to',
                'title'             => 'Route',
                'default'           => "/event",
                'type'              => 'string',
            ]
        ];
    }

    public function onRun()
    {
        $less = new lessc;
        $less->checkedCompile("plugins/bzdbbb/event/components/eventlist/assets/less/eventList.less", "plugins/bzdbbb/event/components/eventlist/assets/css/eventList.css");
        $this->addCss('/plugins/bzdbbb/event/components/eventlist/assets/css/eventList.css');
    }

    public function events()
    {
        return Event::all();
    }

    public function getRoute()
    {
        return $this->property('route');
    }
}