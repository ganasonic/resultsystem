@extends('layouts.app')

@section('title', 'エアジャッジ画面')

@section('content')
<div class="container" id="air">

    <!-- エアヘッダ -->
    <div class="row">
        <div class="col-3">
            <label class="form-label"><h5>1st Air Code</h5></label>
        </div>
        <div class="col-3">
            <label class="form-label"><h5>Air Score</h5></label>
        </div>
<!--        
        <div class="col-2">
            <label class="form-label"></label>
        </div>
-->
        <div class="col-3">
            <label class="form-label"><h5>2nd Air Code</h5></label>
        </div>
        <div class="col-3">
            <label class="form-label"><h5>Air Score</h5></label>
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:10px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- エア -->
    <div class="row">
        <div class="col-3">
            <input type="text" class="form-control" style="font-size: 1.4rem;" v-bind:value="air_code1">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" style="font-size: 1.4rem;" v-bind:value="air_point1">
        </div>
        <div class="col-1">
            <label class="form-label"></label>
        </div>
        <div class="col-3">
            <input type="text" class="form-control" style="font-size: 1.4rem;" v-bind:value="air_code2">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" style="font-size: 1.4rem;" v-bind:value="air_point2">
        </div>
        <div class="col-1">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:20px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- エア種別ボタン -->
    <div class="row">
        <div class="col-6">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <button type="button" class="btn btn-outline-primary btn-lg btn-group-font" v-on:click="onSelectFlip1">Flip</button>
                <button type="button" class="btn btn-outline-primary btn-lg btn-group-font" v-on:click="onSelect3D1">3D</button>
                <button type="button" class="btn btn-outline-primary btn-lg btn-group-font" v-on:click="onSelectSpn1">Spin</button>
                <button type="button" class="btn btn-outline-primary btn-lg btn-group-font" v-on:click="onSelectUp1">Up</button>
            </div>
        </div>
<!--        
        <div class="col-2">
            <label class="form-label"></label>
        </div>
-->
        <div class="col-6">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <button type="button" class="btn btn-outline-primary btn-lg btn-group-font" v-on:click="onSelectFlip2">Flip</button>
                <button type="button" class="btn btn-outline-primary btn-lg btn-group-font" v-on:click="onSelect3D2">3D</button>
                <button type="button" class="btn btn-outline-primary btn-lg btn-group-font" v-on:click="onSelectSpn2">Spin</button>
                <button type="button" class="btn btn-outline-primary btn-lg btn-group-font" v-on:click="onSelectUp2">Up</button>
            </div>
        </div>
        <!--
        <div class="col-1">
        </div>
-->
    </div>

    <!-- 空行 -->
    <div class="row" style="height:20px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- リスト -->
    <div class="row">
        <div class="col-6">
            <select name="aircode_1" v-model="selectedAirCode1" v-on:change="onChangeDD1" size=6 style="width: 100px;">
                <!--エアコード※＠がないとエラーになる-->
                <option v-for="aircode1 in aircodecategories1" style="font-size: 1.2rem;" v-bind:value="aircode1.code">@{{ aircode1.code }}</option>
            </select>
        </div>
<!--        
        <div class="col-2">
            <label class="form-label"></label>
        </div>
-->
        <div class="col-6">
            <select name="aircode_2" v-model="selectedAirCode2" v-on:change="onChangeDD2" size=6 style="width: 100px;">
                <!--エアコード※＠がないとエラーになる-->
                <option v-for="aircode2 in aircodecategories2" style="font-size: 1.2rem;" v-bind:value="aircode2.code">@{{ aircode2.code }}</option>
            </select>
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:20px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>


    <!-- 軸MAXボタン -->
    <div class="row">
        <div class="col-1">
            <label class="form-label">Axis Max</label>
        </div>
        <div class="col-5">
            <button type="button" class="btn btn-success btn-lg btn-font mr-4" v-on:click="onTapAxis10_1">10</button>
            <button type="button" class="btn btn-warning btn-lg btn-font mr-4" v-on:click="onTapAxis08_1">08</button>
            <button type="button" class="btn btn-danger btn-lg btn-font mr-4" v-on:click="onTapAxis04_1">04</button>
        </div>
<!--        
        <div class="col-2">
            <label class="form-label"></label>
        </div>
-->
        <div class="col-1">
            <label class="form-label">Axis Max</label>
        </div>
        <div class="col-5">
            <button type="button" class="btn btn-success btn-lg btn-font mr-4" v-on:click="onTapAxis10_2">10</button>
            <button type="button" class="btn btn-warning btn-lg btn-font mr-4" v-on:click="onTapAxis08_2">08</button>
            <button type="button" class="btn btn-danger btn-lg btn-font mr-4" v-on:click="onTapAxis04_2">04</button>
        </div>
<!--        
        <div class="col-2">
            <label class="form-label"></label>
        </div>
-->
        </div>

    <!-- 空行 -->
    <div class="row" style="height:20px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>


    <!-- グラブMAXボタン -->
    <div class="row">
        <div class="col-1">
            <label class="form-label">Grab Max</label>
        </div>
        <div class="col-5">
            <button type="button" class="btn btn-success btn-lg btn-font mr-4" v-bind:disabled="isGrab1" v-on:click="onTapGrab10_1">10</button>
            <button type="button" class="btn btn-warning btn-lg btn-font mr-4" v-bind:disabled="isGrab1" v-on:click="onTapGrab06_1">06</button>
            <button type="button" class="btn btn-danger btn-lg btn-font mr-4" v-bind:disabled="isGrab1" v-on:click="onTapGrab04_1">04</button>
        </div>
<!--        
        <div class="col-2">
            <label class="form-label"></label>
        </div>
-->
        <div class="col-1">
            <label class="form-label">Grab Max</label>
        </div>
        <div class="col-5">
            <button type="button" class="btn btn-success btn-lg btn-font mr-4" v-bind:disabled="isGrab2" v-on:click="onTapGrab10_2">10</button>
            <button type="button" class="btn btn-warning btn-lg btn-font mr-4" v-bind:disabled="isGrab2" v-on:click="onTapGrab06_2">06</button>
            <button type="button" class="btn btn-danger btn-lg btn-font mr-4" v-bind:disabled="isGrab2" v-on:click="onTapGrab04_2">04</button>
        </div>
<!--        
        <div class="col-2">
            <label class="form-label"></label>
        </div>
-->
    </div>


    <!-- 空行 -->
    <div class="row" style="height:20px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>

    <!-- レンジヘッダ -->
    <div class="row">
        <div class="col-6">
            <span class="level-font">@{{ loadLevelString1(air_point1) }}</span>
        </div>
<!--        
        <div class="col-2">
            <label class="form-label"></label>
        </div>
-->
        <div class="col-6">
            <span class="level-font">@{{ loadLevelString2(air_point2) }}</span>
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:20px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>


    <!-- レンジ -->
    <div class="row">
        <div class="col-6">
            <input type="range" class="form-range" min="0" v-bind:max="current_max1" step="0.1" id="airpoint1" style="width: 100%;" v-model.number="air_point1" v-on:change="onAirPoint1">
        </div>
<!--        
        <div class="col-2">
            <label class="form-label"></label>
        </div>
-->
        <div class="col-6">
            <input type="range" class="form-range" min="0" v-bind:max="current_max2" step="0.1" id="airpoint1" style="width: 100%;" v-model.number="air_point2" v-on:change="onAirPoint2">
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:20px;">
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
        <button type="button" class="btn btn-warning common-btn" v-on:click="onReapply">Reapply</button>
    </div>
    <div class="position-absolute bottom-0 end-0">
        <button type="button" class="btn btn-success common-btn" v-on:click="onConfirm">Confirm</button>
    </div>

</div>
<script src="{{asset('/js/air.js')}}"></script>
@endsection


