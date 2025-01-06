<?php

namespace App\Imports;

use App\Models\RaceInformation;
use Maatwebsite\Excel\Concerns\ToModel;

class RaceInfoParamImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RaceInformation([
            //
            'name' => $row[0], 
            'value' => $row[1], 
            'value_en' => $row[2],
        ]);
    }
}
