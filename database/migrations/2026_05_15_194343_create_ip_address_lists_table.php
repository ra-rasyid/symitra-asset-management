<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ip_address_lists', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->unique(); // IP Address 
            $table->string('username');             // Username 
            $table->string('department');           // Department [cite: 110, 161]
            $table->string('device');               // Device 
            $table->string('location');             // Location [cite: 111, 162]
            $table->text('remark')->nullable();     // Remark 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ip_address_lists');
    }
};
