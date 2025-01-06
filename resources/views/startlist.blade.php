@extends('layouts.common')

@section('title', '設定画面')

@section('content')
<div class="container" id="startlist">

    <!-- ヘッダ -->
    <div class="row">
        <div class="col-2">
        <div>
<!--
            <b-button variant="outline-primary" v-on:click="onDrawList">ドロー</b-button>
-->
            <button type="button" class="btn btn-danger" v-on:click="onDrawList">ドロー</button>
        </div>
        </div>
        <div class="col-10">
        </div>
    </div>


    <!-- 空行 -->
    <div class="row" style="height:10px;">
        <div class="col-5">
            <label class="form-label"></label>
        </div>
    </div>

    <input type="hidden" id="valueSex" value="{{ $sex }}" :v-bind="sex">
    <input type="hidden" id="valueClass" value="{{ $raceclass }}" :v-bind="racekind">



    <template>
    <div>
    <b-table
        class="text-left"
        :items="{{ @racerlists }}"
        select-mode="single"
        selectable
        primary-key="url"
        ></b-table>
    </div>
    <div>
    <b-table
        class="text-left"
        :items="{{ @dnslists }}"
        select-mode="single"
        selectable
        primary-key="url"
        ></b-table>
    </div>
    </template>

<!--
    <table class="table">
    <thead class="sticky-top bg-white">
    <tr>
    <th>No</th>
    <th>Start</th>
    <th>乱数</th>
    <th>BIB</th>
    <th>SAJ</th>
    <th>FIS</th>
    <th>名前</th>
    <th>県連</th>
    <th>所属</th>
    </tr>
    </thead>
    <tbody>
    @foreach($racerlists as $racerlist)
    <tr>
    <td>{{$racerlist->通番}}</td>
    <td>{{$racerlist->start}}</td>
    <td>{{$racerlist->rand}}</td>
    <td>{{$racerlist->BIB}}</td>
    <td>{{$racerlist->SAJNO}}</td>
    <td>{{$racerlist->FISNO}}</td>
    <td>{{$racerlist->氏名漢}}</td>
    <td>{{$racerlist->県連盟}}</td>
    <td>{{$racerlist->所属}}</td>
    </tr>
    @endforeach
    </tbody>
    </table>
-->
</div>

<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/startlist.js')}}"></script>

@endsection