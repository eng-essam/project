<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencecertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencecerts', function (Blueprint $table) {
            $table->id();
            $table->string('personal_card');
            $table->string('card');
            $table->string('License');
            $table->string('recruitment');
            $table->string('assignment');
            $table->string('statement');
            $table->string('movements');
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
        Schema::dropIfExists('experiencecerts');
    }
}
