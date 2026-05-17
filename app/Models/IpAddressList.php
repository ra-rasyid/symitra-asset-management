<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IpAddressList extends Model
{
    protected $table = 'ip_address_lists';

    // Daftarkan kolom yang boleh diisi di sini
    protected $fillable = [
        'ip_address',
        'username',
        'department',
        'device',
        'location',
        'remark'
    ];

    /**
     * Department relation (by dept_name)
     */
    public function departmentData(): BelongsTo
    {
        return $this->belongsTo(MasterDepartment::class, 'department', 'dept_name');
    }

    /**
     * Device relation (by device_name)
     */
    public function deviceData(): BelongsTo
    {
        return $this->belongsTo(MasterHardwareDevice::class, 'device', 'device_name');
    }

    /**
     * Location relation (by location_name)
     */
    public function locationData(): BelongsTo
    {
        return $this->belongsTo(MasterLocation::class, 'location', 'location_name');
    }
}