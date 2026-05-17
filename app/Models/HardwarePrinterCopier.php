<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HardwarePrinterCopier extends Model
{
    protected $table = 'hardware_printer_copiers';
    protected $fillable = ['item_name', 'brand', 'model_type', 'serial_number', 'mac_address', 'username', 'project', 'location', 'remark'];

    /**
     * Get the project that owns this asset.
     */
    public function projectData(): BelongsTo
    {
        return $this->belongsTo(MasterProject::class, 'project', 'project_name');
    }

    /**
     * Get the location that owns this asset.
     */
    public function locationData(): BelongsTo
    {
        return $this->belongsTo(MasterLocation::class, 'location', 'location_name');
    }
}
