<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'type', 'dimension',  'url', 'created'];
}
