<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterHardwareDevice extends Model
{
    protected $table = 'master_hardware_devices';

    protected $fillable = [
        'device_name'
    ];

    /**
     * Get all IP addresses for this device type.
     */
    public function ipAddresses(): HasMany
    {
        return $this->hasMany(IpAddressList::class, 'device', 'device_name');
    }
}
