<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkettingPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marketting_people', function (Blueprint $table) {
            $table->increments('mp_id')->onDelete('cascade');
            $table->string('mp_name');
            $table->string('mp_address');
            $table->string('mp_contact');
            $table->string('mp_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marketting_people');
    }
}
