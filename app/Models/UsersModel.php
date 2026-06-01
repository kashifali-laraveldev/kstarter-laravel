<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersModel extends Authenticatable
{
    protected $table = 'ks_users';

    protected $fillable = [
        'user_name',
        'password',
        'is_active',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password'  => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function profile()
    {
        return $this->hasOne(UserProfilesModel::class, 'user_name', 'user_name');
    }

    public function roles()
    {
        return $this->belongsToMany(RolesModel::class, 'ks_user_roles', 'user_id', 'role_id');
    }

    public function userRoles()
    {
        return $this->hasMany(UserRolesModel::class, 'user_id');
    }

    public function getStatusAttribute(): string
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }
}
