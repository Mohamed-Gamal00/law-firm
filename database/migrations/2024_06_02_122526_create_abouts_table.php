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
            $table->string('icon')->nullable();
            $table->text('content')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_content')->nullable();
            $table->string('about_video_link')->nullable();
            $table->string('about_video_title')->nullable();
            $table->text('about_video_content')->nullable();
            $table->string('about_featuers')->nullable();
            $table->string('team_work')->nullable();
            $table->string('happy_clients')->nullable();
            $table->string('successful_lawsuits')->nullable();
            $table->string('successful_consultations')->nullable();
            $table->text('customer_reviews_content')->nullable();
            $table->string('customer_reviews_client_image')->nullable();
            $table->string('customer_reviews_client_name')->nullable();
            $table->string('customer_reviews_client_type')->nullable();
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
