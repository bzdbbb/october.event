<?php namespace bzdbbb\Event\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('bzdbbb_event_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('slug')->index();
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        Schema::create('bzdbbb_event_events_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('event_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->primary(['event_id', 'category_id']);
        });
    }

    public function down()
    {
        Schema::drop('bzdbbb_event_categories');
        Schema::drop('bzdbbb_event_events_categories');
    }

}
