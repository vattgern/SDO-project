<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
      'role', 'slug'
    ];

    public function permissions():BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'roles_permissions', 'role_id', 'permission_id');
    }

    public function user(){
        return $this->belongsToMany(User::class, 'roles_users', 'role_id', 'user_id');
    }
}
