<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchases_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->decimal('cost',10,2);
            $table->decimal('IVACost',10,4)->default(0);
            $table->decimal('costIVA',10,4)->default(0);
            $table->decimal('price',10,4)->default(0);
            $table->decimal('IVAprice',10,4)->default(0);
            $table->decimal('priceIVA',10,4)->default(0);
            $table->decimal('totalPurchase',10,4)->default(0); 
            $table->integer('quantity');
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
        Schema::dropIfExists('purchase_details');
    }
}
