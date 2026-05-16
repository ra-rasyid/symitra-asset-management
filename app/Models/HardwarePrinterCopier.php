<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HardwarePrinterCopier extends Model
{
    protected $table = 'hardware_printer_copiers';
protected $fillable = ['item_name', 'brand', 'model_type', 'serial_number', 'mac_address', 'username', 'project', 'location', 'remark'];
}
