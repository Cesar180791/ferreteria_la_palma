<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('barCode',25)->nullable(); 
            $table->decimal('cost',10,4)->default(0);
            $table->decimal('IVACost',10,4)->default(0);
            $table->decimal('costIVA',10,4)->default(0);
            $table->decimal('price',10,4)->default(0);
            $table->decimal('IVAprice',10,4)->default(0);
            $table->decimal('priceIVA',10,4)->default(0);
            $table->integer('quantity')->default(0);
            $table->foreignId('sub_category_id')->constrained();
            
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
        Schema::dropIfExists('products');
    }
}
