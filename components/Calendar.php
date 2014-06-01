<?php namespace bzdbbb\Event\Components;

use Cms\Classes\ComponentBase;
use bzdbbb\Event\Models\Event;
use DB as Db;

class Calendar extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Calendar Component',
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
        $this->addJs('/plugins/bzdbbb/event/assets/jquery/jquery.js');
        $this->addJs('/plugins/bzdbbb/event/assets/underscore/underscore.js');
        $this->addJs('/plugins/bzdbbb/event/assets/bootstrap-calendar/js/calendar.js');
        $this->addJs('/plugins/bzdbbb/event/assets/bootstrap/dist/js/bootstrap.js');
        $this->addJs('/plugins/bzdbbb/event/assets/moment/moment.js');

        $this->addJs('/modules/system/assets/js/framework.js');

        $this->addJs('/plugins/bzdbbb/event/components/calendar/assets/js/app.js');

        $this->addCss('/plugins/bzdbbb/event/assets/bootstrap-calendar/css/calendar.css');
    }

    public function event()
    {
        $event = Event::whereHas('categories', function($q)
        {
            $q->where('name', '=', 'Ceilidh');

        })->orderBy('startDate')->first();
        return $event;
    }

    public function getRoute()
    {
        return $this->property('route');
    }

    public function mapEventToCalendarEvent($event)
    {
        return [
                "id" => $event["id"],
                "title" => $event["summary"],
                "url" => ("/event/" . $event["id"]),
                "class" => "event-warning",
                "start" => strtotime($event["startDate"]) * 1000,
                "end" => strtotime($event["endDate"]) * 1000
        ];
    }

    public function onGetEvents()
    {
        $events = Event::all()->toArray();
        return array_map(array($this, 'mapEventToCalendarEvent'), $events);
    }
}