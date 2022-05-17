<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'name', 'middle_name', 'last_name', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function students(){
        return $this->belongsToMany(Student::class, 'student_parent', 'parent_id', 'student_id');
    }
}
