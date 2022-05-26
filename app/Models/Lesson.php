<?php

namespace App\Models;

use App\Models\Users\Teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'lessons';
    protected $fillable = [
        'name', 'code'
    ];

    public function teachers(){
        return $this->belongsToMany(Teacher::class, 'lessons_teachers' , 'id_lesson' , 'id_teacher');
    }
}
