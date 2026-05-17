<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterStatus extends Model
{
    protected $table = 'master_statuses';

    protected $fillable = [
        'status_name',
        'status_color'
    ];

    public function hardwareNbPcs(): HasMany
    {
        return $this->hasMany(HardwareNbPc::class, 'status_id');
    }

    public function hardwarePrinters(): HasMany
    {
        return $this->hasMany(HardwarePrinterCopier::class, 'status_id');
    }

    public function hardwareOthers(): HasMany
    {
        return $this->hasMany(HardwareOtherDevice::class, 'status_id');
    }

    public function ipAddresses(): HasMany
    {
        return $this->hasMany(IpAddressList::class, 'status_id');
    }
}
