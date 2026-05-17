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
        Schema::create('hardware_other_devices', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('brand');
            $table->string('model_type');
            $table->string('serial_number')->unique();
            $table->string('mac_address')->nullable();
            $table->string('username')->nullable();
            $table->string('project')->nullable();
            $table->string('location')->nullable();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware_other_devices');
    }
};
