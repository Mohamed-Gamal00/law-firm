<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->string('features')->nullable();
            $table->string('feature_content')->nullable();
            $table->string('video_link')->nullable();
            $table->string('video_title')->nullable();
            $table->text('video_content')->nullable();
            $table->string('points')->nullable();
            $table->string('team_work')->nullable();
            $table->string('happy_clients')->nullable();
            $table->string('successful_lawsuits')->nullable();
            $table->string('successful_consultations')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
