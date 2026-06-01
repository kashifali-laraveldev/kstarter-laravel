<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolesModel extends Model
{
    protected $table = 'ks_roles';

    protected $fillable = [
        'role_name',
        'display_order',
    ];

    public function users()
    {
        return $this->belongsToMany(UsersModel::class, 'ks_user_roles', 'role_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(PermissionsModel::class, 'ks_role_permissions', 'role_id', 'permission_id');
    }

    public function rolePermissions()
    {
        return $this->hasMany(RolePermissionsModel::class, 'role_id');
    }
}
