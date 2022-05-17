<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'middle_name', 'last_name', 'user_id'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
