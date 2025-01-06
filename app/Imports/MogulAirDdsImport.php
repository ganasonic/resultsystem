<?php

namespace App\Imports;

use App\Models\MogulAirDd;
use Maatwebsite\Excel\Concerns\ToModel;

class MogulAirDdsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MogulAirDd([
            //
            'code' => $row[0], 
            'type' => $row[1], 
            'value_m' => $row[2],
            'value_f' => $row[3],
        ]);
    }
}
