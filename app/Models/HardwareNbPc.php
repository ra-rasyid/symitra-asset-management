<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HardwareNbPc extends Model
{
    protected $table = 'hardware_nb_pcs'; // Menghubungkan ke tabel MySQL

    protected $fillable = [
        'item_name', 
        'brand', 
        'model_type', 
        'serial_number', 
        'mac_address', 
        'username', 
        'project', 
        'location', 
        'remark'
    ];

    /**
     * Get the project that owns this asset.
     */
    public function projectData(): BelongsTo
    {
        return $this->belongsTo(MasterProject::class, 'project', 'project_name');
    }

    public function locationData(): BelongsTo
    {
        return $this->belongsTo(MasterLocation::class, 'location', 'location_name');
    }
}