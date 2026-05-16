<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RemoteAccess extends Model
{
    protected $table = 'remote_accesses'; // Menghubungkan ke tabel MySQL
    protected $fillable = [
    'device_type',
    'username',
    'app_name',
    'device_id',
    'password',
    'project',
    'location'
];
}
