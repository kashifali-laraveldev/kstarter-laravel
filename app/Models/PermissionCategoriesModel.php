<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionCategoriesModel extends Model
{
    protected $table = 'ks_permission_categories';

    protected $fillable = [
        'category_name',
        'css_class',
        'display_order',
    ];

    public function permissions()
    {
        return $this->hasMany(PermissionsModel::class, 'permission_category_id');
    }
}
