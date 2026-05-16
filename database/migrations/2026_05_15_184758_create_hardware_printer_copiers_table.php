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
        Schema::create('hardware_printer_copiers', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');      // Item Name / Class
            $table->string('brand');          // Brand
            $table->string('model_type');     // Model / Type
            $table->string('serial_number')->unique(); // Serial Number
            $table->string('mac_address')->nullable(); // Mac Address / Host Name
            $table->string('username')->nullable();    // Username
            $table->string('project')->nullable();     // Project
            $table->string('location')->nullable();    // Location
            $table->text('remark')->nullable();        // Remark
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_printer_copiers');
    }
};
