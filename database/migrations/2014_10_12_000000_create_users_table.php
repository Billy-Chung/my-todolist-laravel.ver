<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('su_id');
            $table->string('su_uid');
            $table->string('password');
            $table->string('su_join_date');
            $table->string('su_name');
            $table->string('su_email')->nullable();
            $table->string('su_mobile_code');
            $table->integer('su_sucid');
            $table->string('su_check')->nullable();
            $table->string('su_pass_date');
            $table->boolean('su_state');
            $table->string('su_allow_item')->nullable();
            $table->integer('su_err_cnt');
            $table->boolean('su_is_store');
            $table->string('su_area_code');
            $table->integer('su_job_status');
            $table->boolean('su_del');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
