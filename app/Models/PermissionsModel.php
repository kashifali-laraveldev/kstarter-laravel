<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionsModel extends Model
{
    protected $table = 'ks_permissions';

    protected $fillable = [
        'permission_category_id',
        'permission_name',
        'route',
        'show_in_menu',
        'css_class',
        'display_order',
    ];

    protected function casts(): array
    {
        return [
            'show_in_menu' => 'boolean',
        ];
    }

    public function category()
    {
        return $this->belongsTo(PermissionCategoriesModel::class, 'permission_category_id');
    }

    public function roles()
    {
        return $this->belongsToMany(RolesModel::class, 'ks_role_permissions', 'permission_id', 'role_id');
    }
}
