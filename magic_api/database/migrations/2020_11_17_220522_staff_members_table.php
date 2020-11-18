<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StaffMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_members', function (Blueprint $table) {
            $table->increments('staff_member_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->unsignedInteger('staff_type_id');

            // Staff type id is foreign key
            $table->foreign('staff_type_id')->references('staff_type_id')->on('staff_types')->onDelete('cascade');

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
        Schema::dropIfExists('staff_members');
    }
}
