<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('albums', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('s_description');
            $table->string('l_description');
            $table->string('place');
            $table->boolean('public');
            $table->integer('photos_number');
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
		Schema::table('albums', function(Blueprint $table)
		{
            Schema::dropIfExists("albums");
		});
	}

}