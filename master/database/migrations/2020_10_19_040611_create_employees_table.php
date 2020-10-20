<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('employee_number',50);
            $table->string('first_name',50);
            $table->string('last_name',50)->nullable();
            $table->integer('m_company_id')->length(10)->unsigned()->nullable();
            $table->string('email',150)->nullable();
            $table->boolean('is_delete')->default(0); //temporary
            $table->string('created_by',50)->default('Administrator'); //temporary
            $table->dateTime('created_date')->useCurrent(); //temporary
            $table->string('updated_by',50)->nullable();
            $table->dateTime('updated_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
