<?php namespace bzdbbb\Event\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEventsTable extends Migration
{

    public function up()
    {
        Schema::create('bzdbbb_event_events', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('summary');
            $table->string('url');
            $table->string('location');
            $table->text('description');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->string('duration');
            $table->double('latitude');
            $table->double('longitude');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('bzdbbb_event_events');
    }

}
