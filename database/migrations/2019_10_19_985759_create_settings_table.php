<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sitename_ar');
            $table->string('sitename_en');
            $table->string('sitename_fr');
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('discover_me_titel')->nullable();
            $table->longtext('discover_me_des')->nullable();
            $table->string('discover_me_video')->nullable();
            $table->string('trainees')->nullable();
            $table->string('lectures')->nullable();
            $table->string('events')->nullable();
            $table->string('company')->nullable();
            $table->longtext('personal_information')->nullable();
            $table->longtext('privacy_policy')->nullable();
            $table->longtext('refund_policy')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('home_photo')->nullable();
            $table->string('event_photo')->nullable();
            $table->string('about_video')->nullable();
            $table->string('our_courses_photo')->nullable();
            
             
            $table->enum('system_status', ['open', 'close'])->default('open');
            $table->longtext('system_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
