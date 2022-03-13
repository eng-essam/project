<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessionlicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionlicenses', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('graduation');
            $table->string('excellence');
            $table->string('birth');
            $table->string('personal');
            $table->string('fesh');
            $table->string('situation');
            $table->string('receipt');
            $table->string('certificate')->nullable();
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
        Schema::dropIfExists('professionlicenses');
    }
}
