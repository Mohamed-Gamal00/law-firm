<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsArticlesTable extends Migration {

	public function up()
	{
		Schema::create('NewsArticles', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->string('content');
			$table->string('image')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('NewsArticles');
	}
}
