<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicscertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicscerts', function (Blueprint $table) {
            $table->id();
            $table->string('contract');
            $table->string('engineer');
            $table->string('receipt');
            $table->string('tax_card');
            $table->string('approval');
            $table->string('presonal');
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
        Schema::dropIfExists('clinicscerts');
    }
}
