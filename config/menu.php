<?php
/**
 * home config
 * 
 * @author      yutao
 * @since       PHP 7.0.1
 * @version     1.0.0
 * @date        2018-1-15 13:09:05
 * @copyright   Copyright(C) bravesoft Inc.
 */
return [
    //menu config
    'racemenuq' => [
        'menu01' => ['name' => '女子予選1', 'url' => '/processrace/Q1/F', 'class' => 'btn_col_f', 'sub_name' => 'レース進行画面'],
        'menu02' => ['name' => '男子予選1', 'url' => '/processrace/Q1/M', 'class' => 'btn_col_m', 'sub_name' => 'レース進行画面'],
        'menu03' => ['name' => '女子予選2', 'url' => '/processrace/Q2/F', 'class' => 'btn_col_f', 'sub_name' => 'レース進行画面'],
        'menu04' => ['name' => '男子予選2', 'url' => '/processrace/Q2/M', 'class' => 'btn_col_m', 'sub_name' => 'レース進行画面'],
    ],
    'racemenuf' => [
        'menu05' => ['name' => '女子決勝1', 'url' => '/processrace/F1/F', 'class' => 'btn_col_f', 'sub_name' => 'レース進行画面'],
        'menu06' => ['name' => '男子決勝1', 'url' => '/processrace/F1/M', 'class' => 'btn_col_m', 'sub_name' => 'レース進行画面'],
        'menu07' => ['name' => '女子決勝2', 'url' => '/processrace/F2/F', 'class' => 'btn_col_f', 'sub_name' => 'レース進行画面'],
        'menu08' => ['name' => '男子決勝2', 'url' => '/processrace/F2/M', 'class' => 'btn_col_m', 'sub_name' => 'レース進行画面'],
    ],
    'resultmenuq' => [
        'menu01' => ['name' => '女子予選1', 'url' => '/resultlist/Q1/F', 'class' => 'btn_col_f', 'sub_name' => 'リザルト表示画面'],
        'menu02' => ['name' => '男子予選1', 'url' => '/resultlist/Q1/M', 'class' => 'btn_col_m', 'sub_name' => 'リザルト表示画面'],
        'menu03' => ['name' => '女子予選2', 'url' => '/resultlist/Q2/F', 'class' => 'btn_col_f', 'sub_name' => 'リザルト表示画面'],
        'menu04' => ['name' => '男子予選2', 'url' => '/resultlist/Q2/M', 'class' => 'btn_col_m', 'sub_name' => 'リザルト表示画面'],
    ],
    'resultmenuf' => [
        'menu05' => ['name' => '女子決勝1', 'url' => '/resultlist/F1/F', 'class' => 'btn_col_f', 'sub_name' => 'リザルト表示画面'],
        'menu06' => ['name' => '男子決勝1', 'url' => '/resultlist/F1/M', 'class' => 'btn_col_m', 'sub_name' => 'リザルト表示画面'],
        'menu07' => ['name' => '女子決勝2', 'url' => '/resultlist/F2/F', 'class' => 'btn_col_f', 'sub_name' => 'リザルト表示画面'],
        'menu08' => ['name' => '男子決勝2', 'url' => '/resultlist/F2/M', 'class' => 'btn_col_m', 'sub_name' => 'リザルト表示画面'],
    ],
    'listmenu' => [
        'menu05' => ['name' => '男子一覧画面', 'url' => '/pointlist/m', 'class' => 'btn_col_m', 'sub_name' => 'ポイントリスト'],
        'menu06' => ['name' => '女子一覧画面', 'url' => '/pointlist/f', 'class' => 'btn_col_f', 'sub_name' => 'ポイントリスト'],
        'menu07' => ['name' => '', 'url' => '', 'class' => '', 'sub_name' => ''],
        'menu08' => ['name' => '', 'url' => '', 'class' => '', 'sub_name' => ''],
        'menu01' => ['name' => '男子エントリーリスト', 'url' => '/entrylist/m', 'class' => 'btn_col_m', 'sub_name' => 'エントリーリスト'],
        'menu02' => ['name' => '女子エントリーリスト', 'url' => '/entrylist/f', 'class' => 'btn_col_f', 'sub_name' => 'エントリーリスト'],
        'menu03' => ['name' => '男子スタートリスト', 'url' => '/startlist/m', 'class' => 'btn_col_m', 'sub_name' => 'DNS込みリスト'],
        'menu04' => ['name' => '女子スタートリスト', 'url' => '/startlist/f', 'class' => 'btn_col_f', 'sub_name' => 'DNS込みリスト'],
    ],
    'homemenu1' => [
        'menu01' => ['name' => 'ターンジャッジ', 'url' => '/turnjudge', 'class' => 'btn_col01', 'sub_name' => 'ターン点入力'],
        'menu02' => ['name' => 'エアジャッジ', 'url' => '/airjudge', 'class' => 'btn_col01', 'sub_name' => 'エア点入力'],
        'menu03' => ['name' => 'MOジャッジ', 'url' => '/headjudge', 'class' => 'btn_col05', 'sub_name' => 'MOヘッドジャッジ用'],
        'menu04' => ['name' => 'DMヘッド', 'url' => '/dmheadjudge', 'class' => 'btn_col05', 'sub_name' => 'DMヘッドジャッジ用'],
        'menu05' => ['name' => 'タイム入力', 'url' => '/timeinput', 'class' => 'btn_col04', 'sub_name' => 'タイム入力'],
    ],
    'homemenu2' => [
        'menu05' => ['name' => 'レース選択', 'url' => '/selectrace', 'class' => 'btn_col03', 'sub_name' => '現在レース決定'],
        'menu06' => ['name' => 'リスト表示', 'url' => '/selectlist', 'class' => 'btn_col03', 'sub_name' => '選手リスト'],
        'menu07' => ['name' => 'リザルト表示', 'url' => '/resultindex', 'class' => 'btn_col03', 'sub_name' => 'リザルト関連'],
        'menu08' => ['name' => '大会情報', 'url' => '/raceinformation', 'class' => 'btn_col03', 'sub_name' => '大会情報'],
    ],
    'homemenu3' => [
        'menu09' => ['name' => '設定', 'url' => '/setting', 'class' => 'btn_col02', 'sub_name' => '大会情報'],
    ],
    'numbermenu' => [
        'menu01' => ['name' => '7', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum7'],
        'menu02' => ['name' => '8', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum8'],
        'menu03' => ['name' => '9', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum9'],

        'menu04' => ['name' => '4', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum4'],
        'menu05' => ['name' => '5', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum5'],
        'menu06' => ['name' => '6', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum6'],

        'menu07' => ['name' => '1', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum1'],
        'menu08' => ['name' => '2', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum2'],
        'menu09' => ['name' => '3', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum3'],

        'menu10' => ['name' => '0', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onNum0'],
        'menu11' => ['name' => '.', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onPeriod'],
        'menu12' => ['name' => 'clear', 'url' => 'javascript:void(0);', 'class' => 'btn_col02', 'vonclick' => 'onClear'],
    ],

];
