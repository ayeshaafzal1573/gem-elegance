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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->double('subtotal',10,2);
            $table->double('shipping',10,2);
            $table->double('coupan_code',10,2)->nullable();
            $table->double('discount',10,2)->nullable();
            $table->double('grand_total',10,2);
//USER ADDRESSES
$table->string('first_name');
$table->string('last_name');
$table->string('email');
$table->string('mobile');
  $table->foreignId('country_id')->constrained()->onDelete('cascade');
$table->text('address');
$table->string('apartment')->nullable();
$table->string('city');
$table->string('state');
$table->string('zip');
$table->text('notes');
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
        Schema::dropIfExists('orders');
    }
};
