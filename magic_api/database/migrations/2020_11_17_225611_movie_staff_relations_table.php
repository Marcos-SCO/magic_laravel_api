<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MovieStaffRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_staff_relations', function (Blueprint $table) {

            $table->increments('movie_staff_relation_id');
            
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('staff_member_id');

            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->foreign('staff_member_id')->references('staff_member_id')->on('staff_members');

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
        Schema::dropIfExists('movie_staff_relations');
    }
}
