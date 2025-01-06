<?php

use Illuminate\Database\Seeder;

class JudgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('judges')->insert([
            [
                'fname_j' => '小林', 
                'mname_j' => '', 
                'gname_j' => '正明', 
                'fname_e' => 'KOBAYASHI', 
                'mname_e' => '', 
                'gname_e' => 'MASAAKI', 
                'pref' => '長野県', 
                'nation' => 'JPN', 
                'delete' => '0', 
            ],
            [
                'fname_j' => '宮崎', 
                'mname_j' => '', 
                'gname_j' => '仙咲', 
                'fname_e' => 'MIYAZAKI', 
                'mname_e' => '', 
                'gname_e' => 'SENSAKU', 
                'pref' => '青森県', 
                'nation' => 'JPN', 
                'delete' => '0', 
            ],
            [
                'fname_j' => '門間', 
                'mname_j' => '', 
                'gname_j' => '康成', 
                'fname_e' => 'MONNMA', 
                'mname_e' => '', 
                'gname_e' => 'YASUNARI', 
                'pref' => '北海道', 
                'nation' => 'JPN', 
                'delete' => '0', 
            ],
            [
                'fname_j' => '高野', 
                'mname_j' => '', 
                'gname_j' => '美鳥', 
                'fname_e' => 'TAKANO', 
                'mname_e' => '', 
                'gname_e' => 'MIDORI', 
                'pref' => '福島県', 
                'nation' => 'JPN', 
                'delete' => '0', 
            ],
            [
                'fname_j' => '伊藤', 
                'mname_j' => '', 
                'gname_j' => '強', 
                'fname_e' => 'ITOU', 
                'mname_e' => '', 
                'gname_e' => 'TSUYOSHI', 
                'pref' => '愛知県', 
                'nation' => 'JPN', 
                'delete' => '0', 
            ],
            [
                'fname_j' => '伊藤', 
                'mname_j' => '', 
                'gname_j' => '創', 
                'fname_e' => 'ITOU', 
                'mname_e' => '', 
                'gname_e' => 'HAJIME', 
                'pref' => '新潟県', 
                'nation' => 'JPN', 
                'delete' => '0', 
            ],
            [
                'fname_j' => '橋場', 
                'mname_j' => '', 
                'gname_j' => '一枝', 
                'fname_e' => 'HASHIBA', 
                'mname_e' => '', 
                'gname_e' => 'KAZUE', 
                'pref' => '北海道', 
                'nation' => 'JPN', 
                'delete' => '0', 
            ],
            [
                'fname_j' => '松本', 
                'mname_j' => '', 
                'gname_j' => '英孝', 
                'fname_e' => 'MATSUMOTO', 
                'mname_e' => '', 
                'gname_e' => 'HIDETAKA', 
                'pref' => '埼玉県', 
                'nation' => 'JPN', 
                'delete' => '0', 
            ],
        ]);
    }
}
/*
            $table->string('fname_j');
            $table->string('mname_j');
            $table->string('gname_j');
            $table->string('fname_e');
            $table->string('mname_e');
            $table->string('gname_e');
            $table->string('pref');
            $table->string('nation');
*/