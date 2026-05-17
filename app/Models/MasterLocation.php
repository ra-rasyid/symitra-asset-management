<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterLocation extends Model
{
    protected $table = 'master_locations';

    protected $fillable = [
        'location_name',
        'location_code',
        'description'
    ];

    /**
     * Get all hardware NB PCs at this location.
     */
    public function hardwareNbPcs(): HasMany
    {
        return $this->hasMany(HardwareNbPc::class, 'location', 'location_name');
    }

    /**
     * Get all printer copiers at this location.
     */
    public function hardwarePrinters(): HasMany
    {
        return $this->hasMany(HardwarePrinterCopier::class, 'location', 'location_name');
    }

    /**
     * Get all other devices at this location.
     */
    public function hardwareOthers(): HasMany
    {
        return $this->hasMany(HardwareOtherDevice::class, 'location', 'location_name');
    }

    /**
     * Get all remote accesses at this location.
     */
    public function remoteAccesses(): HasMany
    {
        return $this->hasMany(RemoteAccess::class, 'location', 'location_name');
    }
}
