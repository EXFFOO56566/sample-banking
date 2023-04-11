<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('color1')->nullable();
            $table->string('color2')->nullable();
            $table->string('email_from')->nullable();
            $table->longText('email_body')->nullable();
            $table->boolean('email_notification')->default(0);
            $table->longText('sms_api')->nullable();
            $table->boolean('sms_notification')->default(0);
            $table->string('registration')->default(0);
            $table->longText('script')->nullable();
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
