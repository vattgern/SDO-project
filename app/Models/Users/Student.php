<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'middle_name', 'last_name', 'user_id', 'student_cart'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parents(){
        return $this->belongsToMany(Parents::class, 'student_parent', 'student_id', 'parent_id');
    }
}
