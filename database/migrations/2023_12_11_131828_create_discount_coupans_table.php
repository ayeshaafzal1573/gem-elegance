<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_coupans', function (Blueprint $table) {
            $table->id();
            //the discount coupan code
            $table->string('code');
            //the human readable discount coupan code
            $table->string('name')->nullable();
            //the description of the coupan-Not Necessary
            $table->text('description')->nullable();
            //The max uses this discount coupan has
            $table->integer('max_uses')->nullable();
            //How many times a user can use this coupan
            $table->integer('max_uses_user')->nullable();
            //Whether or not the coupan is a percentage or a fixed price
            $table->enum('type',['percent','fixed'])->default('fixed');

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
        Schema::dropIfExists('discount_coupans');
    }
};
