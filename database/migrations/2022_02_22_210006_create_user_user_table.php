<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_user', function (Blueprint $table) {

            /* $table->unsignedBigInteger('user1_id');
            $table->unsignedBigInteger('user2_id');
            $table->foreign('user1_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user2_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');*/


            $table->id();
            $table->foreignId('user1_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user2_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreignId('service_id')->constrained();
            $table->text('message')->default('جاري مراجعة البيانات');
            $table->enum('status',['yes','no','جاري مراجعة البيانات'])->default('جاري مراجعة البيانات');
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
        Schema::dropIfExists('user_user');
    }
}
