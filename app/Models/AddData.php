<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddData extends Model
{
    use HasFactory;
    protected $table = 'add_data';
    protected $fillable = [
        'location',
        'user',
        'paymentType',
        'expence',
        'description',
        'amount',
        'custom_date',
    ];
}
