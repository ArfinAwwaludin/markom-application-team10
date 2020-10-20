<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50);
            $table->string('name',50);
            $table->string('description',255);
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
        Schema::dropIfExists('roles');
    }
}
