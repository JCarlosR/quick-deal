<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');

            // Provider (who is applying)
            $table->integer('provider_id')->unsigned();
            $table->foreign('provider_id')->references('id')->on('users');

            // Service request
            $table->integer('service_request_id')->unsigned();
            $table->foreign('service_request_id')->references('id')->on('service_requests');

            // Status
            $table->enum('status', ['Por confirmar', 'Rechazado', 'Confirmado'])->default('Por confirmar');

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
        Schema::drop('applications');
    }
}
