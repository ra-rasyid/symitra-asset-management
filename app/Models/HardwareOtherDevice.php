<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HardwareOtherDevice extends Model
{
    protected $table = 'hardware_other_devices';
    protected $fillable = ['item_name', 'brand', 'model_type', 'serial_number', 'mac_address', 'username', 'project', 'location', 'remark'];
    }
