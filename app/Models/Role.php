<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }

    protected $fillable = [
        'name',
    ];
}
