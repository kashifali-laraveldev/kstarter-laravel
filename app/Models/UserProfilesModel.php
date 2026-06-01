<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfilesModel extends Model
{
    protected $table = 'ks_user_profiles';

    protected $fillable = [
        'user_name',
        'first_name',
        'last_name',
        'email_address',
        'mobile_number',
        'department_name',
        'designation_name',
        'profile_picture',
        'country',
    ];

    public function user()
    {
        return $this->belongsTo(UsersModel::class, 'user_name', 'user_name');
    }
}
