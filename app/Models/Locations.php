<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Locations extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'name', 'type', 'dimension',  'url', 'created'];


    public function characters(): HasMany
    {
        return $this->hasMany(Characters::class);
    }
}
