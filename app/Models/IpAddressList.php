<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}