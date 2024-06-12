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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('fax')->nullable();
            $table->string('address')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('tw_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('linkdin_link')->nullable();
            $table->text('footer_content_right')->nullable();
            $table->text('footer_content_left')->nullable();
            $table->string('booking_title')->nullable();
            $table->string('media_center_title')->nullable();
            $table->text('media_center_content')->nullable();
            $table->string('media_center_video_link')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
