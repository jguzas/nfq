<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('comments', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('comment');
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
        Schema::table('comments', function(Blueprint $table)
        {
            Schema::dropIfExists("comments");
        });
	}

}