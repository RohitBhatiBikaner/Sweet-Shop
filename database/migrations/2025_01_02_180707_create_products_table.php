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
            $table->string('name')->default("Soan Papdi");
            $table->string('flavour')->default('Regular');
            $table->longText('Description')->nullable();
            $table->string('main_image')->nullable();
            $table->timestamps();//column name for database and his data type image save in string datatype
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');//this line for table rollback 
    }
};
