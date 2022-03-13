<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialiststablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialiststables', function (Blueprint $table) {
            $table->id();
            $table->string('registration');
            $table->string('personal_card');
            $table->string('card');
            $table->string('specialty');
            $table->string('personal');
            $table->string('receipt');
            $table->string('experience');
            $table->string('fellowship');
            $table->string('Professional');
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
        Schema::dropIfExists('specialiststables');
    }
}
