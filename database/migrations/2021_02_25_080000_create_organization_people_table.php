<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_people', function (Blueprint $table) {
            $table->increments('op_id')->onDelete('cascade');
            $table->unsignedInteger('op_organization');
            $table->foreign('op_organization')->references('org_id')->on('organizations');
            $table->string('op_name');
            $table->string('op_contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_people');
    }
}
