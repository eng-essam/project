<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivateclinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privateclinics', function (Blueprint $table) {
            $table->id();
            $table->string('contract');
            $table->string('certificate');
            $table->string('card');
            $table->string('building');
            $table->string('recipe');
            $table->string('device');
            $table->string('purchase');
            $table->string('license');
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
        Schema::dropIfExists('privateclinics');
    }
}
