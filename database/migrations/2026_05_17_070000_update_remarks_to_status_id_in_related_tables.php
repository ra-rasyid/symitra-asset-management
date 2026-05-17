<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = [
            'hardware_nb_pcs',
            'hardware_printer_copiers',
            'hardware_other_devices',
            'ip_address_lists',
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->unsignedBigInteger('status_id')->nullable()->after('location');
            });
        }

        $statusMap = DB::table('master_statuses')->pluck('id', 'status_name')->toArray();

        foreach ($tables as $tableName) {
            foreach ($statusMap as $statusName => $statusId) {
                DB::table($tableName)
                    ->where('remark', $statusName)
                    ->update(['status_id' => $statusId]);
            }
        }

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                if (Schema::hasColumn($table->getTable(), 'remark')) {
                    $table->dropColumn('remark');
                }
                $table->foreign('status_id')->references('id')->on('master_statuses')->nullOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'hardware_nb_pcs',
            'hardware_printer_copiers',
            'hardware_other_devices',
            'ip_address_lists',
        ];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->dropForeign(['status_id']);
            });
        }

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->text('remark')->nullable()->after('location');
                $table->dropColumn('status_id');
            });
        }
    }
};
