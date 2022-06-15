<?php

namespace App\Models\Users;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'student_cart' , 'group_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function parents(){
        return $this->belongsToMany(Parents::class, 'student_parent', 'student_id', 'parent_id');
    }

    public function group(){
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
}
