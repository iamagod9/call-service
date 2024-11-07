<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'path',
    ];
}
