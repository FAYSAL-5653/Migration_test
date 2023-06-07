<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('sort_dis',500);
            $table->string('price',50);
            $table->boolean('discount');
            $table->string('discount_price',50);
            $table->string('images',200);
            $table->boolean('stock');
            $table->float('star');
            $table->enum('remark',['populer','new','top','special','treanding','regular',]);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('brand_id');
//ralation with category table
            $table->foreign('category_id')
            ->references('id')->on('categories')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
//ralation with brand table
            $table->foreign('brand_id')
            ->references('id')->on('brands')
            ->restrictOnDelete()
            ->cascadeOnUpdate();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
