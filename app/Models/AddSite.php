<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddSite extends Model
{
    use HasFactory;
    protected $table = 'add_sites';
    protected $fillable = [
        'name',
        'address',
        'siteOwner',
        'siteIncharge',
        'superVisor',
    ];
}
