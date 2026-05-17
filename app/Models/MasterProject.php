<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MasterProject extends Model
{
    protected $table = 'master_projects';
    
    protected $fillable = [
        'project_name',
        'project_code',
        'description'
    ];

    /**
     * Get all hardware NB PCs for this project.
     */
    public function hardwareNbPcs(): HasMany
    {
        return $this->hasMany(HardwareNbPc::class, 'project', 'project_name');
    }

    /**
     * Get all printer copiers for this project.
     */
    public function hardwarePrinters(): HasMany
    {
        return $this->hasMany(HardwarePrinterCopier::class, 'project', 'project_name');
    }

    /**
     * Get all other devices for this project.
     */
    public function hardwareOthers(): HasMany
    {
        return $this->hasMany(HardwareOtherDevice::class, 'project', 'project_name');
    }

    /**
     * Get all remote accesses for this project.
     */
    public function remoteAccesses(): HasMany
    {
        return $this->hasMany(RemoteAccess::class, 'project', 'project_name');
    }
}
