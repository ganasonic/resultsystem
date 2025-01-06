<?php

use Illuminate\Database\Seeder;

class RacerListTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('racerlist')->insert([
            [
                'id' => $row[0], 
                'sex' => $row[1], 
                'season' => $row[2],
                'codex' => $row[3],
                '通番' => $row[4],
                'rand' => $row[5],
                '出欠' => $row[6],
                'ｺﾒﾝﾄ' => $row[7],
                'BIB' => $row[8],
                'SAJNO' => $row[9],
                'FISNO' => $row[10],
                '氏名R' => $row[11],
                '氏名漢' => $row[12],
                '国名' => $row[13],
                '県連盟' => $row[14],
                'FIS_AEﾎﾟｲﾝﾄ' => $row[15],
                'FIS_HPﾎﾟｲﾝﾄ' => $row[16],
                'FIS_MOﾎﾟｲﾝﾄ' => $row[17],
                'FIS_SXﾎﾟｲﾝﾄ' => $row[18],
                'FIS_SSﾎﾟｲﾝﾄ' => $row[19],
                'SAJ_AEﾎﾟｲﾝﾄ' => $row[20],
                'SAJ_HPﾎﾟｲﾝﾄ' => $row[21],
                'SAJ_MOﾎﾟｲﾝﾄ' => $row[22],
                'SAJ_SXﾎﾟｲﾝﾄ' => $row[23],
                'SAJ_SSﾎﾟｲﾝﾄ' => $row[24],
                '所属' => $row[25],
                '生年月日' => $row[26],
                'ｸﾗｽ' => $row[27],
                '氏名2' => $row[28],
                '学年' => $row[29],
                '競技者ｺｰﾄﾞ' => $row[30],
                '姓' => $row[31],
                '名' => $row[32],
                'ｾｲ' => $row[33],
                'ﾒｲ' => $row[34],
                'sei' => $row[35],
                'mei' => $row[36],
                '所属2' => $row[37],
            ],
        ]);
    }
}
