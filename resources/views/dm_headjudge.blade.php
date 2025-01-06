@extends('layouts.app')

@section('title', 'ヘッドジャッジ画面')

@section('content')

<div class="container" id="head">

    <!-- タイトル -->
    <div class="row">
        <div class="col-9">
            <label class="form-label dm-title-font-blue">Blue Course Point</label>
        </div>
    </div>

    <!--base-->
    <div class="row">
        <div class="col">
            <ul class="dm_head">
            <li><a href="javascript:void(0)" class="btn_dm_head" ><div><span>Judge 1</span><p>@{{ judge1 }}</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm_head" ><div><span>Judge 2</span><p>@{{ judge2 }}</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm_head" ><div><span>Judge 3</span><p>@{{ judge3 }}</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm_head" ><div><span>Judge 4</span><p>@{{ judge4 }}</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm_head" ><div><span>Judge 5</span><p>@{{ judge5 }}</p></div></a></li>
            <template v-if="current_result.judgenum > 5">
            <li><a href="javascript:void(0)" class="btn_dm_head" ><div><span>Judge 6</span><p>@{{ judge6 }}</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm_head" ><div><span>Judge 7</span><p>@{{ judge7 }}</p></div></a></li>
            </template>
            </ul>
        </div>            
    </div>

    <!-- 入力値の表示 -->
    <div class="row">
        <div class="col-8">
            <span class="level-font bigfont-blue">@{{ blue_point }}</span>
            <span class="level-font bigfont-black">ー</span>
            <span class="level-font bigfont-redhead">@{{ red_point }}</span>
        </div>
        <div class="col-4">
            <div class="row" style="height:40%;">
                <template v-if="blue_point >= red_point">
                    <div class="row bg-primary">
                        <label class="form-label dm-title-font-l text-white">Blue 青コースの勝利</label>
                    </div>
                </template>
                <template v-else>
                    <div class="row bg-danger">
                        <label class="form-label dm-title-font-l text-white">Red 赤コースの勝利</label>
                    </div>
                </template>
            </div>
            <div class="row">
                <template v-if=" type == 'RDNS' || type == 'RDNF' || type == 'RDSQ' ">
                    <div class="row dm-red-font-m">
                        <label class="form-label dm-red-font-m">赤コース@{{ dnstype }}</label>
                    </div>
                </template>
                <template v-else-if=" type == 'BDNS' || type == 'BDNF' || type == 'BDSQ' ">
                    <div class="row dm-blue-font-m">
                        <label class="form-label dm-blue-font-m">青コース@{{ dnstype }}</label>
                    </div>
                </template>
                <template v-else>
                    <div class="row">
                        <label class="form-label dm-title-font-m">　</label>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <!-- DNS/DNF -->
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio1b" v-on:click="onSetStatus('BDNF')" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio1b">DNF</label>

                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio2b" v-on:click="onSetStatus('BDNS')" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2b">DNS</label>

                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio3b" v-on:click="onSetStatus('BDSQ')" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio3b">DSQ</label>

                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradion" v-on:click="onSetStatus('N')" autocomplete="off">
                    <label class="btn btn-outline-success" for="btnradion"></label>

                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio1r" v-on:click="onSetStatus('RDNF')" autocomplete="off">
                    <label class="btn btn-outline-danger" for="btnradio1r">DNF</label>

                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio2r" v-on:click="onSetStatus('RDNS')" autocomplete="off">
                    <label class="btn btn-outline-danger" for="btnradio2r">DNS</label>

                    <input type="radio" class="btn-check" name="btnradio_dnf" id="btnradio3r" v-on:click="onSetStatus('RDSQ')" autocomplete="off">
                    <label class="btn btn-outline-danger" for="btnradio3r">DSQ</label>
                </div>
            </div>
        </div>
        <div class="col-2">
        </div>
        <div class="col-2">
            <div class="row">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio_enable" id="btnradio5" autocomplete="off" checked>
                    <label class="btn btn-outline-secondary" for="btnradio5">Enable</label>

                    <input type="radio" class="btn-check" name="btnradio_enable" id="btnradio6" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btnradio6">Disable</label>
                </div>
            </div>
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

</div>
<script src="{{asset('/js/dmhead.js')}}"></script>
@endsection

