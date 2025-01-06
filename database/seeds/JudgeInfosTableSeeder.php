<?php

use Illuminate\Database\Seeder;

class JudgeInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('judge_infos')->insert([
            [
                'codex' => '5480', 
                'j_id' => '1', 
                'j_no' => '0', 
                'j_kind' => 'ヘッドジャッジ', 
                'delete' => '0', 
            ],
            [
                'codex' => '5480', 
                'j_id' => '2', 
                'j_no' => '1', 
                'j_kind' => 'ターンジャッジ1', 
                'delete' => '0', 
            ],
            [
                'codex' => '5480', 
                'j_id' => '3', 
                'j_no' => '2', 
                'j_kind' => 'ターンジャッジ2', 
                'delete' => '0', 
            ],
            [
                'codex' => '5480', 
                'j_id' => '4', 
                'j_no' => '3', 
                'j_kind' => 'ターンジャッジ3', 
                'delete' => '0', 
            ],
            [
                'codex' => '5480', 
                'j_id' => '5', 
                'j_no' => '4', 
                'j_kind' => 'ターンジャッジ4', 
                'delete' => '0', 
            ],
            [
                'codex' => '5480', 
                'j_id' => '6', 
                'j_no' => '5', 
                'j_kind' => 'ターンジャッジ5', 
                'delete' => '0', 
            ],
            [
                'codex' => '5480', 
                'j_id' => '7', 
                'j_no' => '6', 
                'j_kind' => 'エアジャッジ1', 
                'delete' => '0', 
            ],
            [
                'codex' => '5480', 
                'j_id' => '8', 
                'j_no' => '7', 
                'j_kind' => 'エアジャッジ2', 
                'delete' => '0', 
            ],
            [
                'codex' => '0480', 
                'j_id' => '1', 
                'j_no' => '0', 
                'j_kind' => 'ヘッドジャッジ', 
                'delete' => '0', 
            ],
            [
                'codex' => '0480', 
                'j_id' => '2', 
                'j_no' => '1', 
                'j_kind' => 'ターンジャッジ1', 
                'delete' => '0', 
            ],
            [
                'codex' => '0480', 
                'j_id' => '3', 
                'j_no' => '2', 
                'j_kind' => 'ターンジャッジ2', 
                'delete' => '0', 
            ],
            [
                'codex' => '0480', 
                'j_id' => '4', 
                'j_no' => '3', 
                'j_kind' => 'ターンジャッジ3', 
                'delete' => '0', 
            ],
            [
                'codex' => '0480', 
                'j_id' => '5', 
                'j_no' => '4', 
                'j_kind' => 'ターンジャッジ4', 
                'delete' => '0', 
            ],
            [
                'codex' => '0480', 
                'j_id' => '6', 
                'j_no' => '5', 
                'j_kind' => 'ターンジャッジ5', 
                'delete' => '0', 
            ],
            [
                'codex' => '0480', 
                'j_id' => '7', 
                'j_no' => '6', 
                'j_kind' => 'エアジャッジ1', 
                'delete' => '0', 
            ],
            [
                'codex' => '0480', 
                'j_id' => '8', 
                'j_no' => '7', 
                'j_kind' => 'エアジャッジ2', 
                'delete' => '0', 
            ],
        ]);
    }
}

/*
            $table->string('codex',5);
            $table->unsignedTinyInteger('j_id');
            $table->unsignedTinyInteger('j_no');
            $table->unsignedTinyInteger('j_kind');
            $table->timestamps();
            $table->boolean('delete');

*/