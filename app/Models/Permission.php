<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $timestamps = false;

    public function role()
    {
        return $this->belongsToMany(Role::class);
    }

    public function record()
    {
        return $this->belongsToMany(Record::class);
    }

    protected $fillable = [
        'name',
        'role_id',
        'record_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
