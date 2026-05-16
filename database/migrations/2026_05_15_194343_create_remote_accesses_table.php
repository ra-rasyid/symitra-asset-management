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
        Schema::create('remote_accesses', function (Blueprint $table) {
            $table->id();
            $table->string('device_type');          // Device Type [cite: 132]
            $table->string('username');             // Username [cite: 133]
            $table->string('app_name');             // App. Name [cite: 134]
            $table->string('device_id');            // Device ID [cite: 134]
            $table->string('password');             // Password [cite: 135]
            $table->string('project');              // Project [cite: 136, 163]
            $table->string('location');             // Location [cite: 137, 162]
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remote_accesses');
    }
};
