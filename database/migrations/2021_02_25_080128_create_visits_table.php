<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('vis_id')->onDelete('cascade');;
            $table->unsignedInteger('vis_orgnization');
            $table->foreign('vis_orgnization')->references('org_id')->on('organizations');
            $table->unsignedInteger('vis_orgnization_person');
            $table->foreign('vis_orgnization_person')->references('op_id')->on('organization_people');
            $table->unsignedInteger('vis_marketting_person');
            $table->foreign('vis_marketting_person')->references('mp_id')->on('marketting_people');
            $table->time('vis_time');
            $table->date('vis_date');
            $table->unsignedInteger('vis_purpose');
            $table->foreign('vis_purpose')->references('sof_id')->on('software');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
