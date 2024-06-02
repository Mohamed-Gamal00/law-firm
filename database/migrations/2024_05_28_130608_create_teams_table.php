<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration {

	public function up()
	{
		Schema::create('teams', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();

			$table->string('name');
			$table->string('job_title')->nullable();
			$table->string('experience')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('twitter')->nullable();
			$table->string('facebook')->nullable();
			$table->string('instagram')->nullable();
			$table->string('linked_in')->nullable();
			$table->text('personal_info')->nullable();
			$table->string('certifications')->nullable();
            $table->string('image')->nullable();

		});
	}

	public function down()
	{
		Schema::drop('teams');
	}
}
