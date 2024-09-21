<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('species'); // Species of the flower
            $table->string('flower_type'); // Type of the flower
            $table->string('plant_type'); // Type of the plant
            $table->string('image')->nullable(); // Image path, nullable
            $table->timestamps(); // Created at and updated at timestamps
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('flowers');
    }
};
