<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests', function (Blueprint $table) {
            $table->increments('id');

            // User petitioner
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            // Type
            $table->integer('service_type_id')->unsigned();
            $table->foreign('service_type_id')->references('id')->on('service_types');

            // Date
            $table->date('request_date');

            // Hour
            $table->time('request_time');

            // Status
            $table->enum('status', ['En espera', 'Asignado', 'Confirmado']);

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
        Schema::drop('service_requests');
    }
}
