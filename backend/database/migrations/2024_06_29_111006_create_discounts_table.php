<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->decimal('percentage', 5, 2); 
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
};
