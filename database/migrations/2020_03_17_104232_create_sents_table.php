<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sents', function (Blueprint $table) {
            $table->id();
            $table->string('to');
            $table->string('subject');
            $table->text('body');
            $table->unsignedInteger('user_id');
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::table('sents', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sents');
    }
}
