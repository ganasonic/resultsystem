<?php

use Illuminate\Database\Seeder;

class RaceinfoParamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('raceinfo_params')->insert([
            [
                'name' => 'course_length', 
                'value' => '245', 
                'value_en' => '',
            ],
            [
                'name' => 'pace_time_f', 
                'value' => '8.8', 
                'value_en' => '',
            ],
            [
                'name' => 'pace_time_m', 
                'value' => '10.3', 
                'value_en' => '',
            ],
            [
                'name' => 'codex_f', 
                'value' => '5480', 
                'value_en' => '8322',
            ],
            [
                'name' => 'codex_m', 
                'value' => '0480', 
                'value_en' => '8321',
            ],
        ]);

    }
}
