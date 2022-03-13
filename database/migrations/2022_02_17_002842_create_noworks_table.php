<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noworks', function (Blueprint $table) {
            $table->id();
            $table->string('disclaimer');
            $table->string('fulltime');
            $table->string('card');
            $table->string('personal_card');
            $table->string('ministry');
            $table->string('endServ');
            $table->string('brent');
            $table->string('insurance');
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
        Schema::dropIfExists('noworks');
    }
}
