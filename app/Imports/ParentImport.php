<?php

namespace App\Imports;

use App\Models\Users\Parents;
use App\Models\Users\Role;
use App\Models\Users\Student;
use App\Models\Users\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;

class ParentImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $parent){

            $user = User::create([
                'phone' => $parent[3],
                'password' => Hash::make($parent[4])
            ]);

            $user->roles()->attach(Role::where('slug', 'parent')->first());
            $user->save();

            $new_parent = Parents::create([
                'user_id' => $user['id'],
                'name' => $parent[0],
                'middle_name' => $parent[1],
                'last_name' => $parent[2],
            ]);

            for($i = 5; $i < count($parent); $i++){
                $new_parent->students()->attach(Student::where('student_cart', $parent[$i])->first());
                $new_parent->save();
            }
        }
    }
}
