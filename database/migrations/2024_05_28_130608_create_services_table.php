<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration {

	public function up()
	{
		Schema::create('services', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('content');
			$table->text('service_desc')->nullable();
			$table->string('image')->nullable();
			$table->string('phone')->nullable();
			$table->string('whatsapp')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('services');
	}
}
