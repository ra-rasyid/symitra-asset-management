<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterProject extends Model
{
    protected $table = 'master_projects';
    
    protected $fillable = [
        'project_name',
        'project_code',
        'description'
    ];
}
