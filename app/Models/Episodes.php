<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episodes extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'air_date', 'episode',  'url', 'created'];
}
