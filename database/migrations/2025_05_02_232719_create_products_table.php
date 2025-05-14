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
            $table->timestamps();
            $table->string('name',45);
            $table->decimal('value',7,2);
            $table->text('description',100);
            $table->foreignId('category_id')
                ->constrained('categorys', 'id')
                ->onDelete('set null');
            //$table->foreign('category_id')
            //    ->references('id')
            //    ->on('categorys')
            //    ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('products');
    }
};
