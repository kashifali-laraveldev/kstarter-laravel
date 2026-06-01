<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRolesModel extends Model
{
    protected $table = 'ks_user_roles';

    protected $fillable = [
        'user_id',
        'role_id',
    ];

    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(RolesModel::class, 'role_id');
    }
}
