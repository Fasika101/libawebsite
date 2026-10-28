<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'ip',
        'country_code',
        'country_name',
        'page',
        'site',
    ];
}
