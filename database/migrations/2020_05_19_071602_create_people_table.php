<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 32);
            $table->string('last_name', 32)->index();
            $table->string('national_code', 16)->unique();
            $table->string('mobiles', 48)->index()->nullable();
            $table->string('phones', 64)->nullable();
            $table->boolean('is_supervisor')->default(false);
            $table->string('address')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();

            $table->index(['first_name', 'last_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
