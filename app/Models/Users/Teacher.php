<?php

namespace App\Models\Users;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function lessons(){
        return $this->belongsToMany(Lesson::class, 'lessons_teachers' , 'id_teacher' , 'id_lesson');
    }
}
