<?php

namespace App\Imports;

use App\Models\Users\Role;
use App\Models\Users\Teacher;
use App\Models\Users\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class TeacherImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $teacher) {

            $user = User::create([
                'name' => $teacher[0],
                'middle_name' => $teacher[1],
                'last_name' => $teacher[2],
                'login' => $teacher[3],
                'phone' => $teacher[5],
                'password' => Hash::make($teacher[4])
            ]);

            $user->roles()->attach(Role::where('slug', 'teacher')->first());
            $user->save();

            Teacher::create([
                'user_id' => $user['id']
            ]);
        }
    }
}
