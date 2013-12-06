<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FavouritesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('favourites', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('photo_id');
            $table->integer('user_id');
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
        Schema::table('favourites', function(Blueprint $table)
        {
            Schema::dropIfExists("favourites");
        });
	}

}