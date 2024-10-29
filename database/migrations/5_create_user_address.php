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
        Schema::create('User_address', function (Blueprint $table) {
            $table->id('address_id');
            $table->string('address_line1');
            $table->string('address_line2');
            $table->string('subdistrict');
            $table->string('district');
            $table->string('province');
            $table->integer('postalcode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('User_address');
    }
};
