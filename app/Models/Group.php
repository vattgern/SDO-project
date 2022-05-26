<?php

namespace App\Models;

use App\Models\Users\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'groups';

    protected $fillable = [
      'name'
    ];

    public function students(){
        return $this->hasMany(Student::class, 'id_group' , 'id');
    }
}
