@extends('layouts.common')

@section('title', 'リザルト')

@section('content')
<div class="container" id="resultlist">

    <!-- ヘッダ -->
<!--
    <div class="row">
        <div class="col-4">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="labelSexGroup" id="labelFemale" value="F" v-model="sex">
            <label class="form-check-label" for="labelFemale">女子</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="labelSexGroup" id="labelMale" value="M" v-model="sex">
            <label class="form-check-label" for="labelMale">男子</label>
        </div>
        </div>
        <div class="col-4">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="labelRaceKindGroup" id="labelRaceKindQ" value="Q" v-model="racekind">
            <label class="form-check-label" for="labelRaceKindQ">予選</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="labelRaceKindGroup" id="labelRaceKindF1" value="F1" v-model="racekind">
            <label class="form-check-label" for="labelRaceKindF1">決勝1</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="labelRaceKindGroup" id="labelRaceKindF2" value="F2" v-model="racekind">
            <label class="form-check-label" for="labelRaceKindF2">決勝2</label>
        </div>
        </div>
        <div class="col-2">
        </div>
        <div class="col-2">
        <div>
            <b-button variant="outline-primary" v-on:click="onGetStart">取得</b-button>
        </div>
        </div>
    </div>
-->
    <input type="hidden" id="valueSex" value="{{ $sex }}" :v-bind="sex">
    <input type="hidden" id="valueClass" value="{{ $raceclass }}" :v-bind="racekind">


    <!-- メッセージ -->
    <div class="row" style="height:30px;">
        <div class="col-12">
            <span class="message-font bg-warning">@{{ message }}</span>
        </div>
    </div>

    <template>

    <div>
    <b-table
        class="text-left"
        :items="{{ $resultlist }}"
        select-mode="single"
        selectable
        primary-key="url"
        @row-selected="onRowSelected"
        ></b-table>
    </div>
<!--
    <b-table
        class="text-left"
        :items="items"
        select-mode="single"
        selectable
        primary-key="url"
        @row-selected="onRowSelected"
        ></b-table>
    </div>
-->    
    <!-- 空行 -->
    <div class="row" style="height:20px;">
        <div class="col-5">
            <label class="form-label">Not Classified</label>
        </div>
    </div>

    <b-table
        class="text-left"
        :items="{{ $nonclasslist }}"
        select-mode="single"
        selectable
        primary-key="start"
        ></b-table>
    </div>
    </template>

    <!-- ヘッダ -->
    <div class="row">
        <div class="col-2">
            <button type="button" class="btn btn-danger" v-on:click="onCreateStartList('Q2')">予選２スタートリスト作成</button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-danger" v-on:click="onCreateStartList('F1')">決勝１スタートリスト作成</button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-danger" v-on:click="onCreateStartList('F2')">決勝２スタートリスト作成</button>
        </div>
        <!-- メッセージ -->
        <div class="col-4">
            <span class="message-font">@{{ message }}</span>
        </div>
    </div>

    <!-- 空行 -->
    <div class="row" style="height:10px;">
        <div class="col-9">
            <label class="form-label"></label>
        </div>
    </div>
    
    <input type="hidden" id="valueSex" value="{{ $sex }}" :v-bind="sex">
    <input type="hidden" id="valueClass" value="{{ $raceclass }}" :v-bind="racekind">



</div>

<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/resultlist.js')}}"></script>
@endsection

