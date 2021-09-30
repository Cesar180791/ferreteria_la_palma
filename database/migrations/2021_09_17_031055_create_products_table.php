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
            $table->decimal('cost',10,2)->default(0);
            $table->decimal('price',10,2)->default(0);
            $table->integer('stock');
            $table->integer('alerts');
            $table->string('image', 100)->nullable();

            //creacion de llave foranea
           // $table->unsignedBigInteger('sub_category_id');
           // $table->foreign('sub_category_id')->references('id')->on('sub_categories'); 
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
