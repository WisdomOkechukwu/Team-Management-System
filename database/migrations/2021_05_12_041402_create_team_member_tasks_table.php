<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamMemberTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_member_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task_detail');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('status');
            $table->bigInteger('team_id')->unsigned();
            $table->bigInteger('team_member_id')->unsigned();
            $table->bigInteger('Biz_id')->unsigned();
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('team_member_id')->references('id')->on('team_members')->onDelete('cascade');
            $table->foreign('Biz_id')->references('id')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_member_tasks');
    }
}
