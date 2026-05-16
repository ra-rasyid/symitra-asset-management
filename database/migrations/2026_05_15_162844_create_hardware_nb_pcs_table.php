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
    Schema::create('hardware_nb_pcs', function (Blueprint $table) {
        $table->id();
        $table->string('item_name');      // Item Name / Class
        $table->string('brand');          // Brand
        $table->string('model_type');     // Model / Type
        $table->string('serial_number')->unique(); // Serial Number
        $table->string('mac_address');    // Mac Address / Host Name
        $table->string('username')->nullable(); 
        $table->string('project')->nullable(); 
        $table->string('location')->nullable();
        $table->text('remark')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_nb_pcs');
    }
};
