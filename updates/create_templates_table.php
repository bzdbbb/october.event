<?php namespace bzdbbb\Event\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTemplatesTable extends Migration
{

    public function up()
    {
        Schema::create('bzdbbb_event_templates', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('bzdbbb_event_templates');
    }

}
