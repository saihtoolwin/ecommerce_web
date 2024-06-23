<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('qty');
            $table->decimal('discount', 5, 2);
            $table->unsignedBigInteger('category_id');
            // $table->unsignedBigInteger('rating_id')->nullable();
            $table->string('image'); 
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('cascade');
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
