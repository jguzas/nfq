<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('photos', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('path');
            $table->string('title');
            $table->string('description');
            $table->dateTime("date");
            $table->boolean('cover');
            $table->integer('album_id');
            $table->dateTime("created_at");
            $table->dateTime("updated_at");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('photos', function(Blueprint $table)
		{
            Schema::dropIfExists("photos");
		});
	}

}