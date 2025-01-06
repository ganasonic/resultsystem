@extends('layouts.common')

@section('title', '大会情報画面')

@section('content')
<div class="container" id="raceinfo">

<!--
<h6>大会情報画面</h6>
-->
<ul class="nav nav-tabs">
  <li class="nav-item">
  <a href="#raceinfo1" class="nav-link active" data-bs-toggle="tab">大会タイトル</a>
  </li>
  <li class="nav-item">
  <a href="#raceinfo2" class="nav-link" data-bs-toggle="tab">大会委員</a>
  </li>
  <li class="nav-item">
    <a href="#raceinfo3" class="nav-link" data-bs-toggle="tab">審判</a>
  </li>
  <li class="nav-item">
    <a href="#raceinfo4" class="nav-link" data-bs-toggle="tab">コースプロフィール</a>
  </li>
  <li class="nav-item">
    <a href="#raceinfo5" class="nav-link" data-bs-toggle="tab">エアバンプス</a>
  </li>
  <li class="nav-item">
    <a href="#raceinfo6" class="nav-link" data-bs-toggle="tab">アドバイザリー前走</a>
  </li>
  <li class="nav-item">
    <a href="#raceinfo7" class="nav-link" data-bs-toggle="tab">その他情報</a>
  </li>
</ul>
<div class="tab-content">

<!--大会タイトル-->
  <div id="raceinfo1" class="tab-pane active">

    <div class="row">
        <div class="mb-3">
            <label for="raceinfo_title" class="form-label"><h6>大会タイトル</h6></label>
            <input type="text" class="form-control" id="raceinfo_title" placeholder="大会タイトル" v-bind:value="race_title">
        </div>
        <!--
            <div class="input-group">
            <select class="form-select" id="raceinfo_title" aria-label="Example select with button addon" v-bind:value="race_title">
                <option selected>選択してください。</option>
                <option value="1">東京都フリースタイルスキー選手権大会</option>
                <option value="2">フリースタイルスキーふくしま#1</option>
                <option value="3">長野県フリースタイルスキー選手権大会</option>
                <option value="3">埼玉県フリースタイルスキー選手権大会</option>
                <option value="3">北海道スキー選手権大会フリースタイルスキー競技</option>
                <option value="2">宮様スキー競技会フリースタイルスキー競技</option>
                <option value="2">はち北モーグル競技#1</option>
                <option value="2">ジュニアオリンピックフリースタイルスキー競技</option>
                <option value="2">全日本スキー選手権大会フリースタイルスキー競技</option>
            </select>
            <button class="btn btn-outline-secondary" type="button">決定</button>
            </div>
            -->

    </div>


    <div class="row">
        <div class="mb-3">
            <label for="raceinfo_title" class="form-label"><h6>Event Title</h6></label>
            <input type="text" class="form-control" id="raceinfo_title" placeholder="大会タイトル（英語）" v-bind:value="race_title_en">
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="raceinfo_sponser" class="form-label"><h6>大会協賛・グレード</h6></label>
            <input type="text" class="form-control" id="raceinfo_sponser" placeholder="大会協賛・グレード">
        </div>

        <div class="col-6">
            <label for="raceinfo_subtitle" class="form-label"><h6>大会種目・サブタイトル</h6></label>
            <input type="text" class="form-control" id="raceinfo_subtitle" placeholder="大会種目・サブタイトル">
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <label for="raceinfo_place" class="form-label"><h6>開催地</h6></label>
            <input type="text" class="form-control" id="raceinfo_place" placeholder="開催地・スキー場">
        </div>

        <div class="col-6">
            <!--
            <div class="input-group date mb-3" id="datetimepicker1" data-target-input="nearest">
                <label for="datetimepicker1" class="pt-2 pr-2">日付：</h6></label>
                <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>
            </div>
            -->
            <label for="raceinfo_date" class="form-label"><h6>開催日程</h6></label>
            <input type="text" class="form-control" id="raceinfo_date" placeholder="開催日程（期間）">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <label class="form-label"><h6></h6></label>
        </div>
    </div>

    <div class="row">
        <div class="col-1">
            <label class="form-label"><h6></h6></label>
        </div>
        <div class="col-1">
            <label class="form-label"><h6>女子</h6></label>
        </div>
        <div class="col-1">
            <label class="form-label"><h6>男子</h6></label>
        </div>
        <div class="col-9">
            <label class="form-label"><h6></h6></label>
        </div>
    </div>

    <div class="row">
        <div class="col-1">
            <label class="form-label"><h6>SAJ</h6></label>
        </div>
        <div class="col-1">
            <input type="text" class="form-control" id="saj_codex_f" placeholder="SAJ Codex Women" v-bind:value="codex_f">
        </div>
        <div class="col-1">
            <input type="text" class="form-control" id="saj_codex_m" placeholder="SAJ Codex Men" v-bind:value="codex_m">
        </div>
        <div class="col-9">
            <label class="form-label"><h6></h6></label>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <label class="form-label"><h6></h6></label>
        </div>
    </div>

    <div class="row">
        <div class="col-1">
            <label class="form-label"><h6>FIS</h6></label>
        </div>
        <div class="col-1">
        <input type="text" class="form-control" id="fis_codex_f" placeholder="FIS Codex Women" v-bind:value="codex_f_en">
        </div>
        <div class="col-1">
        <input type="text" class="form-control" id="fis_codex_m" placeholder="FIS Codex Men" v-bind:value="codex_m_en">
        </div>
        <div class="col-9">
            <label class="form-label"><h6></h6></label>
        </div>
    </div>
<!--
    <div class="row">
        <div class="col-6">
            <table>
                <tr>
                    <th></th>
                    <th><label class="form-label"><h6>SAJ</h6></label></th>
                    <th><label class="form-label"><h6>FIS</h6></label></th>
                </tr>
                <tr>
                    <td><label class="form-label"><h6>女子</h6></label></td>
                    <td><input type="text" class="form-control" id="saj_codex_f" placeholder="SAJ Codex Women">@{{ codex_f }}</td>
                    <td><input type="text" class="form-control" id="fis_codex_f" placeholder="FIS Codex Women"></td>
                </tr>
                <tr>
                    <td><label class="form-label"><h6>男子</h6></label></td>
                    <td><input type="text" class="form-control" id="saj_codex_m" placeholder="SAJ Codex Men">@{{ codex_m }}</td>
                    <td><input type="text" class="form-control" id="fis_codex_m" placeholder="FIS Codex Men"></td>
                </tr>
            </table>
        </div>
        

        <div class="col-6">
        </div>
    </div>
-->
</div>

<!--大会タイトル-->
<div id="raceinfo2" class="tab-pane">

    <div class="row">
        <div class="col-3">
            <label for="raceinfo_racedirector" class="form-label"><h6>競技委員長</h6></label>
            <input type="text" class="form-control" id="raceinfo_racedirector" placeholder="競技委員長">
        </div>
        <div class="col-3">
            <label for="raceinfo_tech_delegate" class="form-label"><h6>技術代表</h6></label>
            <input type="text" class="form-control" id="raceinfo_tech_delegate" placeholder="技術代表">
        </div>
        <div class="col-3">
            <label for="raceinfo_head_judge" class="form-label"><h6>主任審判長</h6></label>
            <input type="text" class="form-control" id="raceinfo_head_judge" placeholder="主任審判長">
        </div>
        <div class="col-3">
            <label for="raceinfo_course_director" class="form-label"><h6>コース係長</h6></label>
            <input type="text" class="form-control" id="raceinfo_course_director" placeholder="コース係長">
        </div>
    </div>

    <div class="row">
        <div class="col-3">
            <label for="raceinfo_racechairman" class="form-label"><h6>大会委員長</h6></label>
            <input type="text" class="form-control" id="raceinfo_racechairman" placeholder="大会委員長">
        </div>
        <div class="col-3">
            <label for="raceinfo_tech_delegate_sub" class="form-label"><h6>技術代表補佐</h6></label>
            <input type="text" class="form-control" id="raceinfo_tech_delegate_sub" placeholder="技術代表補佐">
        </div>
        <div class="col-3">
            <label for="raceinfo_head_judge_sub" class="form-label"><h6>副主任審判長</h6></label>
            <input type="text" class="form-control" id="raceinfo_head_judge_sub" placeholder="副主任審判長">
        </div>
        <div class="col-3">
            <label for="raceinfo_caluculation" class="form-label"><h6>記録計算係長</h6></label>
            <input type="text" class="form-control" id="raceinfo_caluculation" placeholder="記録計算係長">
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <label class="form-label"><h6></h6></label>
        </div>
    </div>

    <div class="row">
        <div class="col-1">
            <label class="form-label"><h6>種目</h6></label>
        </div>
        <div class="col-1">
            <input type="text" class="form-control" id="discipline" placeholder="MO/DM" v-bind:value="discipline" v-on:change="changediscipline()">
        </div>
    </div>

    
</div>

<!--審判-->
<div id="raceinfo3" class="tab-pane">

    <div class="row">
        <label class="form-label"><h6>ターン</h6></label>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="raceinfo_turn_judge1" class="form-label"><h6>ターンジャッジ1</h6></label>
            <input type="text" class="form-control" id="raceinfo_turn_judge1" placeholder="ターンジャッジ1">
        </div>
        <div class="col-4">
            <label for="raceinfo_turn_judge2" class="form-label"><h6>ターンジャッジ2</h6></label>
            <input type="text" class="form-control" id="raceinfo_turn_judge2" placeholder="ターンジャッジ2">
        </div>
        <div class="col-4">
            <label for="raceinfo_turn_judge3" class="form-label"><h6>ターンジャッジ3</h6></label>
            <input type="text" class="form-control" id="raceinfo_turn_judge3" placeholder="ターンジャッジ3">
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <label for="raceinfo_turn_judge4" class="form-label"><h6>ターンジャッジ4</h6></label>
            <input type="text" class="form-control" id="raceinfo_turn_judge4" placeholder="ターンジャッジ4">
        </div>
        <div class="col-4">
            <label for="raceinfo_turn_judge5" class="form-label"><h6>ターンジャッジ5</h6></label>
            <input type="text" class="form-control" id="raceinfo_turn_judge5" placeholder="ターンジャッジ5">
        </div>
        <div class="col-4">
        </div>
    </div>

    <div class="row">
        <label class="form-label"><h6> </h6></label>
    </div>

    <div class="row">
        <label class="form-label"><h6>エア</h6></label>
    </div>
    <div class="row">
        <div class="col-4">
            <label for="raceinfo_air_judge1" class="form-label"><h6>エアジャッジ1</h6></label>
            <input type="text" class="form-control" id="raceinfo_air_judge1" placeholder="エアジャッジ1">
        </div>
        <div class="col-4">
            <label for="raceinfo_air_judge2" class="form-label"><h6>エアジャッジ2</h6></label>
            <input type="text" class="form-control" id="raceinfo_air_judge2" placeholder="エアジャッジ2">
        </div>
        <div class="col-4">
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <div class="row">
                <label class="form-label"><h6>審判制</h6></label>
            </div>
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="5" v-on:click="setJudgeNum(5)" v-model="judgenum" v-if="judgenum == '5'" checked>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value="5" v-on:click="setJudgeNum(5)" v-model="judgenum" v-else>
                    <label class="btn btn-outline-primary" for="btnradio1">５審制</h6></label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="7" v-on:click="setJudgeNum(7)" v-model="judgenum" v-if="judgenum == '7'" checked>
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="7" v-on:click="setJudgeNum(7)" v-model="judgenum" v-else>
                    <label class="btn btn-outline-primary" for="btnradio2">７審制</h6></label>
                </div>
            </div>
        </div>
    </div>
</div>

  <!--コースプロフィール-->
<div id="raceinfo4" class="tab-pane">
    <div class="row">
        <div class="col-6">
            <label for="raceinfo_ski_resort_name" class="form-label"><h6>スキー場名</h6></label>
            <input type="text" class="form-control" id="raceinfo_ski_resort_name" placeholder="スキー場名" v-bind:value="ski_resort_name">
        </div>
        <div class="col-6">
            <label for="raceinfo_ski_resort_name" class="form-label"><h6>Ski Resort</h6></label>
            <input type="text" class="form-control" id="raceinfo_ski_resort_name" placeholder="スキー場名" v-bind:value="ski_resort_name_en">
        </div>
    </div>

    <div class="row">
        <label class="form-label"><h6>ホモロゲーション</h6></label>
    </div>
    <div class="row">
        <div class="col-1">
        <label class="form-label"><h6>国内</h6></label>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" id="raceinfo_homo_name_s" v-bind:value="ski_resort_name">
        </div>
        <div class="col-4">
            <input type="text" class="form-control" id="raceinfo_homo_code_s" v-bind:value="homologation">
        </div>
        <div class="col-4">
            <input type="text" class="form-control" id="raceinfo_homo_course_s" v-bind:value="course_name">
        </div>
    </div>
    <div class="row">
        <label class="form-label"><h6></h6></label>
    </div>
    <div class="row gy-4">
        <div class="col-1">
        <label class="form-label"><h6>FIS</h6></label>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" id="raceinfo_homo_name_f" v-bind:value="ski_resort_name_en">
        </div>
        <div class="col-4">
            <input type="text" class="form-control" id="raceinfo_homo_code_f" v-bind:value="homologation_en">
        </div>
        <div class="col-4">
            <input type="text" class="form-control" id="raceinfo_homo_course_f" v-bind:value="course_name_en">
        </div>
    </div>

    <div class="row">
        <label class="form-label"><h6></h6></label>
    </div>
    <div class="row">
        <div class="col-2">
            <label for="raceinfo_course_length" class="form-label"><h6>コース全長</h6></label>
            <input type="text" class="form-control" id="raceinfo_course_length" placeholder="コース全長（m）" v-bind:value="course_length">
        </div>
        <div class="col-2">
            <label for="raceinfo_course_width" class="form-label"><h6>コース全幅</h6></label>
            <input type="text" class="form-control" id="raceinfo_course_width" placeholder="コース全幅（m）" v-bind:value="course_width">
        </div>
        <div class="col-2">
            <label for="raceinfo_cg_width" class="form-label"><h6>コントロールゲート幅</h6></label>
            <input type="text" class="form-control" id="raceinfo_cg_width" placeholder="コントロールゲート幅（m）" v-bind:value="control_gate_width">
        </div>
        <div class="col-2">
            <label for="raceinfo_course_slope" class="form-label"><h6>平均斜度</h6></label>
            <input type="text" class="form-control" id="raceinfo_course_slope" placeholder="平均斜度（度）" v-bind:value="course_degrees">
        </div>
        <div class="col-2">
            <label for="raceinfo_course_slope" class="form-label"><h6>最大斜度</h6></label>
            <input type="text" class="form-control" id="raceinfo_max_course_slope" placeholder="平均斜度（度）" v-bind:value="max_course_degrees">
        </div>
    </div>
    <div class="row">
        <label class="form-label"><h6>ペースセットタイム</h6></label>
    </div>
    <div class="row">
        <div class="col-1">
            <label class="form-label"><h6></h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>秒速（m/sec）</h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>ペースセットタイム</h6></label>
        </div>
        <div class="col-1">
            <label class="form-label"><h6></h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>秒速（m/sec）</h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>ペースセットタイム</h6></label>
        </div>
    </div>
    <div class="row">
        <div class="col-1">
        <label class="form-label"><h6>女子</h6></label>
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_pace_persec_f" placeholder="秒速メートル（m/sec）" v-bind:value="pace_time_f">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_pace_time_f" placeholder="ペースセットタイム（sec）" v-bind:value="paceset_time_f">
        </div>
        <div class="col-1">
        <label class="form-label"><h6>男子</h6></label>
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_pace_persec_m" placeholder="秒速メートル（m/sec）" v-bind:value="pace_time_m">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_pace_time_m" placeholder="ペースセットタイム（sec）" v-bind:value="paceset_time_m">
        </div>
    </div>
</div>

<!--エアバンプスプロフィール-->
<div id="raceinfo5" class="tab-pane">
    <div class="row">
        <div class="col-1">
        <label class="form-label"><h6></h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>エア台角度（度）</h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>エア台高さ（cm）</h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>スタートから（m）</h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>エア台幅（cm）</h6></label>
        </div>
    </div>
    <div class="row">
        <label class="form-label"><h6> </h6></label>
    </div>
    <div class="row">
        <div class="col-1">
        <label class="form-label"><h6>第1エア</h6></label>
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_1st_air_degree" placeholder="エア台角度（度）" v-bind:value="bump_1st_degrees">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_1st_air_height" placeholder="エア台高さ（cm）" v-bind:value="bump_1st_height">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_1st_air_distance" placeholder="スタートから（m）" v-bind:value="bump_1st_distance">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_1st_air_width" placeholder="エア台幅（cm）" v-bind:value="bump_1st_width">
        </div>
    </div>
    <div class="row">
        <label class="form-label"><h6> </h6></label>
    </div>
    <div class="row">
        <div class="col-1">
        <label class="form-label"><h6>第2エア</h6></label>
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_2nd_air_degree" placeholder="エア台角度（度）" v-bind:value="bump_2nd_degrees">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_2nd_air_height" placeholder="エア台高さ（cm）" v-bind:value="bump_2nd_height">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_2nd_air_distance" placeholder="スタートから（m）" v-bind:value="bump_2nd_distance">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_2nd_air_width" placeholder="エア台幅（cm）" v-bind:value="bump_2nd_width">
        </div>
    </div>

    <div class="row">
        <label class="form-label"><h6> </h6></label>
    </div>

    <div class="row">
        <div class="col-1">
        <label class="form-label"><h6></h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>ランディング角度（度）</h6></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h6>ランディング長（m）</h6></label>
        </div>
        <div class="col-7">
            <label class="form-label"><h6></h6></label>
        </div>
    </div>
    <div class="row">
        <label class="form-label"><h6> </h6></label>
    </div>
    <div class="row">
        <div class="col-1">
        <label class="form-label"><h6>第1エア</h6></label>
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_1st_air_degree" placeholder="ランディング角度（度）" v-bind:value="bump_1st_landing_degrees">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_1st_air_height" placeholder="ランディング長（m）" v-bind:value="bump_1st_landing_length">
        </div>
        <div class="col-7">
            <label class="form-label"><h6></h6></label>
        </div>
    </div>
    <div class="row">
        <label class="form-label"><h6> </h6></label>
    </div>
    <div class="row">
        <div class="col-1">
        <label class="form-label"><h6>第2エア</h6></label>
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_2nd_air_degree" placeholder="ランディング角度（度）" v-bind:value="bump_2nd_landing_degrees">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" id="raceinfo_2nd_air_height" placeholder="ランディング長（m）" v-bind:value="bump_2nd_landing_length">
        </div>
        <div class="col-7">
            <label class="form-label"><h6></h6></label>
        </div>
    </div>
</div>
<!--アドバイザリー前走-->
<div id="raceinfo6" class="tab-pane">
    <h6>アドバイザリー前走</h6>
  </div>
<!--その他情報-->
<div id="raceinfo7" class="tab-pane">
    <h6>その他情報</h6>
    
@{{ start_length }}
@{{ goal_length }}
@{{ start_width }}
@{{ goal_width }}
@{{ start_degrees }}
@{{ goal_degrees }}
@{{  }}
@{{  }}
@{{  }}
@{{  }}
@{{  }}
@{{ numof_final1_f }}
@{{ numof_final2_f }}
@{{ numof_final1_m }}
@{{ numof_final2_m }}
  </div>
</div>
</div>
<script src="{{asset('/js/raceinfo.js')}}"></script>
@endsection