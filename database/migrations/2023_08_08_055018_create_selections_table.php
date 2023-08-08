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
        Schema::create('selections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->string('title');
            $table->boolean('needed');
            $table->string('name');
            $table->string('item_number');
            $table->string('supplier');
            $table->string('link');
            $table->string('image');
            $table->integer('quantity');
            $table->string('dimensions');
            $table->string('finish');
            $table->string('color');
            $table->index('project_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selections');
    }
};
