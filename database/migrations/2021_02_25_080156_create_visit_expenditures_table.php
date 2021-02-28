<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_expenditures', function (Blueprint $table) {
            $table->increments('ve_id')->onDelete('cascade');;
            $table->unsignedInteger('ve_visit_info');
            $table->foreign('ve_visit_info')->references('vis_id')->on('visits');
            $table->unsignedInteger('ve_marketting_person');
            $table->foreign('ve_marketting_person')->references('mp_id')->on('marketting_people');
            $table->string('ve_type');
            $table->integer('ve_price');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_expenditures');
    }
}
