<?php

namespace App\Imports;

use App\Models\Users\Role;
use App\Models\Users\Student;
use App\Models\Users\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $student){

            $user = User::create([
                'phone' => $student[4],
                'password' => Hash::make($student[5])
            ]);

            $user->roles()->attach(Role::where('slug', 'student')->first());
            $user->save();

            Student::create([
                'user_id' => $user['id'],
                'name' => $student[0],
                'middle_name' => $student[1],
                'last_name' => $student[2],
                'student_cart' => $student[3],
            ]);
        }
    }
}
