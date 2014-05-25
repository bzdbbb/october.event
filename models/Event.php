<?php namespace bzdbbb\Event\Models;

use Model;

/**
 * Event Model
 */
class Event extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'bzdbbb_event_events';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    protected $purgeable = ['maplocation'];

    protected $dates = ['startDate','endDate'];
    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Validation rules
     */
    public $rules = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    
    public $belongsToMany = [
        'categories' => ['bzdbbb\Event\Models\Category', 'table' => 'bzdbbb_event_events_categories', 'order' => 'name']
    ];

    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'photo' => ['System\Models\File']
    ];
    public $attachMany = [];
}