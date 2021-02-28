<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_feedbacks', function (Blueprint $table) {
            $table->increments('vf_id')->onDelete('cascade');;
            $table->unsignedInteger('vf_visit_info');
            $table->foreign('vf_visit_info')->references('vis_id')->on('visits');
            $table->string('vf_feedback',500);
            $table->boolean('vf_follow_up')->default(0);
            $table->date('vf_follow_date');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_feedbacks');
    }
}
