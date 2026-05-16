<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}