@extends('layouts.app')

@section('title', 'ＤＭジャッジ画面')

@section('content')
<div class="container" id="dm">


    <!-- タイトル -->
    <div class="row">
        <div class="col-9">
            <label class="form-label dm-title-font-blue">Blue Course Point</label>
        </div>
    </div>
    
    <!--base-->
    <div class="row">
        <div class="col">
            <ul class="dm_menu">
            <li><a href="javascript:void(0)" class="btn_dm" v-on:click="onTapDm0"><div><p>０</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm" v-on:click="onTapDm1"><div><p>１</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm" v-on:click="onTapDm2"><div><p>２</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm" v-on:click="onTapDm3"><div><p>３</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm" v-on:click="onTapDm4"><div><p>４</p></div></a></li>
            <li><a href="javascript:void(0)" class="btn_dm" v-on:click="onTapDm5"><div><p>５</p></div></a></li>
            </ul>
        </div>            
    </div>


    <!-- 空行 -->
    <div class="row" style="height:80px;">
        <div class="col-9">
            @if($judge === 'speed')
                <ul class="dm_menu">
                    <li><a href="javascript:void(0)" class="btn_dm25" v-on:click="onTapDm25"><div><p>2.5</p></div></a></li>
                </ul>
            @else
                <label class="form-label"></label>
            @endif


            <label class="form-label"></label>
        </div>
    </div>


    <!-- 入力値の表示 -->
    <div class="row" style="height:80px;">
        <div class="col-1">
            <label class="form-label"></label>
        </div>
        <div class="col-10">
            <span class="level-font bigfont-blue">@{{ base_point }}</span>
            <span class="level-font bigfont-black">ー</span>
            <span class="level-font bigfont-red">@{{ red_point }}</span>
        </div>
        <div class="col-1">
            <label class="form-label"></label>
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
<!--
    <div class="position-absolute bottom-0 start-0">
        <button type="button" class="btn btn-warning common-btn" v-on:click="onReapply">Reapply</button>
    </div>
    <div class="position-absolute bottom-0 end-0">
        <button type="button" class="btn btn-success common-btn" v-on:click="onConfirm">Confirm</button>
    </div>
-->
</div>
<script src="{{asset('/js/dm.js')}}"></script>
@endsection