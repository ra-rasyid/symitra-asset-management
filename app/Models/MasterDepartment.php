<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterDepartment extends Model
{
    protected $table = 'master_departments';

    protected $fillable = [
        'dept_name',
        'dept_code',
        'remark'
    ];

    /**
     * Get all IP addresses for this department.
     */
    public function ipAddresses(): HasMany
    {
        return $this->hasMany(IpAddressList::class, 'department', 'dept_name');
    }
}
