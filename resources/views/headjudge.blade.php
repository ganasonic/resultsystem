@extends('layouts.app')

@section('title', 'ヘッドジャッジ画面')

@section('content')

<div class="container" id="head">
<!-- ヘッダ -->
    <div class="row">
        <div class="col-2">
            <label class="form-label"><h5>Turn1</h5></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Turn2</h5></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Turn3</h5></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Turn4</h5></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Turn5</h5></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Turn Score</5></label>
        </div>
    </div>

    <!-- ターンベース -->
    <div class="row">
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn1_base" readonly v-bind:value="current_result.turnB1">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn2_base" readonly v-bind:value="current_result.turnB2">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn3_base" readonly v-bind:value="current_result.turnB3">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn4_base" readonly v-bind:value="current_result.turnB4">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn5_base" readonly v-bind:value="current_result.turnB5">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.4rem;" id="score_turn5_base" readonly v-bind:value="current_result.turn">
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:10px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- ターンディダクション -->
    <div class="row">
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn1_deduction" readonly v-bind:value="current_result.turnD1">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn2_deduction" readonly v-bind:value="current_result.turnD2">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn3_deduction" readonly v-bind:value="current_result.turnD3">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn4_deduction" readonly v-bind:value="current_result.turnD4">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_turn5_deduction" readonly v-bind:value="current_result.turnD5">
        </div>
        <div class="col-2">
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:10px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- エアヘッダ -->
    <div class="row">
        <div class="col-1">
            <label class="form-label"></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Air1 Code</h5></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Air1 Score</h5></label>
        </div>
        <div class="col-1">
            <label class="form-label"></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Air2 Code</h5></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Air2 Score</h5></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Air Score</h5></label>
        </div>
    </div>

    <!-- １エア -->
    <div class="row">
        <div class="col-1">
            <template v-if="current_result.air11 != current_result.air21">
            <label class="form-label" style="color:red;background-color: yellow;">1st</label>
            </template>
            <template v-else>
            <label class="form-label">1st</label>
            </template>
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_air1_1st_code" readonly v-bind:value="current_result.air11">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_air1_1st_score" readonly v-bind:value="current_result.air1_1">
        </div>
        <div class="col-1">
            <template v-if="current_result.air11 != current_result.air21">
            <label class="form-label" style="color:red;background-color: yellow;">1st</label>
            </template>
            <template v-else>
            <label class="form-label">1st</label>
            </template>
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_air2_1st_code" readonly v-bind:value="current_result.air21">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_air2_1st_score" readonly v-bind:value="current_result.air2_1">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.4rem;" id="score_air2_1st_score" readonly v-bind:value="current_result.air">
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:10px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- ２エア -->
    <div class="row">
        <div class="col-1">
            <template v-if="current_result.air12 != current_result.air22">
            <label class="form-label" style="color:red;background-color: yellow;">2nd</label>
            </template>
            <template v-else>
            <label class="form-label">2nd</label>
            </template>
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_air1_2nd_code" readonly v-bind:value="current_result.air12">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_air1_2nd_score" readonly v-bind:value="current_result.air1_2">
        </div>
        <div class="col-1">
            <template v-if="current_result.air12 != current_result.air22">
            <label class="form-label" style="color:red;background-color: yellow;">2nd</label>
            </template>
            <template v-else>
            <label class="form-label">2nd</label>
            </template>
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_air2_2nd_code" readonly v-bind:value="current_result.air22">
        </div>
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_air2_2nd_score" readonly v-bind:value="current_result.air2_2">
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:10px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- タイムヘッダ -->
    <div class="row">
        <div class="col-8">
            <label class="form-label"></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Time</h5></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Time Score</h5></label>
        </div>
    </div>

    <!-- タイム -->
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio1" v-on:click="onSetStatus('DNF')" autocomplete="off">
                    <label class="btn btn-outline-danger" for="btnradio1">DNF</label>

                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio2" v-on:click="onSetStatus('DNS')" autocomplete="off">
                    <label class="btn btn-outline-danger" for="btnradio2">DNS</label>

                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio3" v-on:click="onSetStatus('DSQ')" autocomplete="off">
                    <label class="btn btn-outline-danger" for="btnradio3">DSQ</label>

                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio4" v-on:click="onSetStatus('')" autocomplete="off" checked>
                    <label class="btn btn-outline-danger" for="btnradio4">Reset</label>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio_enable" id="btnradio5" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary" for="btnradio5">Enable</label>

                    <input type="radio" class="btn-check" name="btnradio_enable" id="btnradio6" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btnradio6">Disable</label>
                </div>
            </div>
        </div>
    
        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.2rem;" id="score_timepoint" readonly v-bind:value="current_result.sec">
        </div>

        <div class="col-2">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.4rem;" id="score_time" readonly v-bind:value="current_result.time">
        </div>
    </div>

    <!-- 7行目 -->
    <div class="row" style="height:10px;">
        <div class="col-8">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- ヘッダ -->
    <div class="row">
        <div class="col-10">
            <label class="form-label"></label>
        </div>
        <div class="col-2">
            <label class="form-label"><h5>Total Score</h5></label>
        </div>
    </div>

    <!-- 処理ボタン -->
    <div class="row">
        <div class="col-2">
            <!--
            <button v-if="status == 'failed'"  type="button" class="btn btn-danger" style="width: 100%;" v-on:click="onReload">start/reload</button>
            <button v-else="status == 'failed'"  type="button" class="btn btn-warning" style="width: 100%;" v-on:click="onReload">start/reload</button>
            -->
        </div>
        <div class="col-6">
            <label class="form-label"></label>
        </div>
        <div class="col-2">
            <!--
            <button type="button" class="btn btn-success" style="width: 100%;" v-on:click="onConfirm">Confirm</button>
            -->
        </div>
        <div class="col-2">
            <template v-if="current_result.score == 'DNF'">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.4rem; color:blue; background-color: yellow;" id="score_total" readonly v-bind:value="current_result.score">
            </template>
            <template v-else-if="current_result.score == 'DNS'">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.4rem; color:red; background-color: yellow;" id="score_total" readonly v-bind:value="current_result.score">
            </template>
            <template v-else-if="current_result.score == 'DSQ'">
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.4rem; color:yellow; background-color: black;" id="score_total" readonly v-bind:value="current_result.score">
            </template>
            <template v-else>
            <input type="text" class="form-control"  style="text-align: center; font-size: 1.4rem;" id="score_total" readonly v-bind:value="current_result.score">
            </template>
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:10px;">
        <div class="col-9">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- メッセージ -->
    <div class="position-absolute bottom-0 start-0 bg-warning">
        <div class="col-12">
            <span class="message-font">@{{ message }}</span>
        </div>
    </div>    

    <!-- 処理ボタン -->
    <div class="position-absolute bottom-0 start-0">
        <button v-if="status == 'failed'"  type="button" class="btn btn-danger common-btn" v-on:click="onReload">start/reload</button>
        <button v-else="status == 'failed'"  type="button" class="btn btn-warning common-btn" v-on:click="onReload">start/reload</button>
    </div>
    <div class="position-absolute bottom-0 end-0">
        <button type="button" class="btn btn-success common-btn" v-on:click="onConfirm">Confirm</button>
    </div>

<!--    
    <div class="row navbar fixed-bottom navbar-expand-xl bg-secondary">
        <div class="row text-info">
            <div class="col-1">
            <span class="footer-hd-font">start </span><span class="footer-font text-light">@{{ current_result.start }}</span>
            </div>
            <div class="col-1">
            <span class="footer-hd-font">BIB </span><span class="footer-font text-light">@{{ current_result.bib }}</span>
            </div>
            <div class="col-4">
            <span class="footer-hd-font">Name </span><span class="footer-font text-light">@{{ current_result.name }}</span>
            </div>
            <div class="col-2">
            <span class="footer-hd-font">Pref </span><span class="footer-font text-light">@{{ current_result.pref }}</span>
            </div>
            <div class="col-4">
            <span class="footer-hd-font">Team </span><span class="footer-font text-light">@{{ current_result.team }}</span>
            </div>
        </div>
    </div>
-->
</div>
<script src="{{asset('/js/head.js')}}"></script>
<!--
<script>
function loadFinished(){
    onLoaded();
}

window.addEventListener('load', loadFinished);
</script>
-->
@endsection

