<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function roles():BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'roles_permissions', 'permission_id', 'role_id');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'users_permissions', 'permission_id', 'user_id');
    }
}
