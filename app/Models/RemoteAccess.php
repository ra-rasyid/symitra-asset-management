<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RemoteAccess extends Model
{
    protected $table = 'remote_accesses'; // Menghubungkan ke tabel MySQL
    protected $fillable = [
        'device_type',
        'username',
        'app_name',
        'device_id',
        'password',
        'project',
        'location'
    ];

    /**
     * Get the project that owns this remote access.
     */
    public function projectData(): BelongsTo
    {
        return $this->belongsTo(MasterProject::class, 'project', 'project_name');
    }

    /**
     * Get the location that owns this remote access.
     */
    public function locationData(): BelongsTo
    {
        return $this->belongsTo(MasterLocation::class, 'location', 'location_name');
    }
}
