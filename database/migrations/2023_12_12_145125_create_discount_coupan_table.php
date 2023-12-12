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
        Schema::create('discount_coupan', function (Blueprint $table) {
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
            //amount to discount based on type
            $table->double('discount_amount',10,2);
            //amount to discount based on type
            $table->double('min_amount',10,2)->nullable();
            $table->integer('status')->default(1);
            //When the coupan begins
            $table->timestamp('starts_at')->nullable();
                  //When the coupan ends
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('discount_coupan');
    }
};
