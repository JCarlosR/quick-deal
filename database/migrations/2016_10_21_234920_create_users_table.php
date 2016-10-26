<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->boolean('provider')->default(false);

            // Provider data
            $table->string('address');
            $table->string('region');
            $table->string('district');

            $table->integer('service_type_id')->unsigned()->nullable();
            $table->foreign('service_type_id')->references('id')->on('service_types');

            // Contact data for contracts
            $table->string('contract_name');
            $table->string('contract_email');
            $table->string('contract_cellphone');
            $table->string('contract_phone');

            // Contact data for payments
            $table->string('payment_name');
            $table->string('payment_email');
            $table->string('payment_cellphone');
            $table->string('payment_phone');

            // Professional data
            $table->text('professional_profile');
            $table->text('professional_experience');
            $table->text('professional_education');
            $table->text('professional_specialty');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
