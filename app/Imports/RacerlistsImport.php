<?php

namespace App\Imports;

use App\Models\Racerlist;
use Maatwebsite\Excel\Concerns\ToModel;

class RacerlistsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Racerlist([
        //
        'id' => $row[0], 
        'sex' => $row[1], 
        'season' => $row[2],
        'codex' => $row[3],
        'start' => $row[4],
        '通番' => $row[5],
        'rand' => $row[6],
        '出欠' => $row[7],
        'ｺﾒﾝﾄ' => $row[8],
        'BIB' => $row[9],
        'SAJNO' => $row[10],
        'FISNO' => $row[11],
        '氏名R' => $row[12],
        '氏名漢' => $row[13],
        '国名' => $row[14],
        '県連盟' => $row[15],
        'FIS_AEﾎﾟｲﾝﾄ' => $row[16],
        'FIS_HPﾎﾟｲﾝﾄ' => $row[17],
        'FIS_MOﾎﾟｲﾝﾄ' => $row[18],
        'FIS_SXﾎﾟｲﾝﾄ' => $row[19],
        'FIS_SSﾎﾟｲﾝﾄ' => $row[20],
        'SAJ_AEﾎﾟｲﾝﾄ' => $row[21],
        'SAJ_HPﾎﾟｲﾝﾄ' => $row[22],
        'SAJ_MOﾎﾟｲﾝﾄ' => $row[23],
        'SAJ_SXﾎﾟｲﾝﾄ' => $row[24],
        'SAJ_SSﾎﾟｲﾝﾄ' => $row[25],
        '所属' => $row[26],
        '生年月日' => $row[27],
        'ｸﾗｽ' => $row[28],
        '氏名2' => $row[29],
        '学年' => $row[30],
        '競技者ｺｰﾄﾞ' => $row[31],
        '姓' => $row[32],
        '名' => $row[33],
        'ｾｲ' => $row[34],
        'ﾒｲ' => $row[35],
        'sei' => $row[36],
        'mei' => $row[37],
        '所属2' => $row[38],
    ]);
    }
}
