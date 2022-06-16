<?php

namespace App\Imports;

use App\Models\Group;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class GroupsImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $group){
            if($group[0] === null){
                break;
            }
            Group::create([
                'code' => $group[0],
                'name' => $group[1]
            ]);
        }
    }
}
