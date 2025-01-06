@extends('layouts.app')

@section('title', 'タイム入力画面')

@section('content')
<div class="container" id="time">

    <div class="row" style="height: 50%;">
        <div class="col-4">
            <div class="row" style="height: 50%;">
                <div class="col-6">
                    <h5>Time</h5>
                </div>
                <div class="col-6">
                    <input type="text" disabled class="form-control" style="height: 60px;font-size: 2.0rem;" v-bind:value="base_point">
                </div>            
            </div>
        </div>
        <div class="col-4">
            <div class="row" style="height: 80px;">
                <div class="col">
                    <h5>Pace Set Time</h5>
                </div>
                <div class="col">
                    <input type="text" disabled class="form-control" style="height: 60px;font-size: 2.0rem;" v-bind:value="time_paceset">
                </div>            
            </div>
        </div>
        <div class="col-4">
            <div class="row" style="height: 80px;">
                <div class="col">
                    <h5>Time Point</h5>
                </div>
                <div class="col">
                    <input type="text" disabled class="form-control" style="height: 60px;font-size: 2.0rem;" v-bind:value="time_point">
                </div>            
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-8">
            <div class="row">
                <!--Time-->
                <div class="col-12">
                    <div class="row" style="height: 50%;">
                        <div class="col-12">
                            <h5>Second(@{{time_second}})</h5>
                            <input type="range" class="form-range" min="0" max="60" step="1" id="timesecond" style="width: 100%;" v-model.number="time_second"  v-on:change="onSecond">
                        </div>
                    </div>
                    <!-- 空行 -->
                    <div class="row" style="height:20px;">
                        <div class="col-5">
                            <label class="form-label"></label>
                        </div>
                    </div>
                    <div class="row" style="height: 50%;">
                        <div class="col-12">
                            <h5>Millisecond(@{{time_millisecond}})</h5>
                            <input type="range" class="form-range" min="0" max="99" step="1" id="timemillisecond" style="width: 100%;" v-model.number="time_millisecond"  v-on:change="onMillisecond">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="height: 80%;">
                <div class="col-8">
                </div>
                <!--Pace Set Time-->
                <div class="col-4">
                    <!--
                    <div class="row" style="height: 10%;">
                    </div>
                    <div class="row" style="height: 30%;">
                        <div class="col-12">
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-warning" style="width: 100%;" v-on:click="onReapply">Reapply</button>
                        </div>
                    </div>
                    <div class="row" style="height: 30%;">
                        <div class="col-12">
                        </div>
                        <div class="col-12">
                            <button type="button" class="btn btn-success" style="width: 100%;" v-on:click="onConfirm">Confirm</button>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
        
        <!--Time Point-->
        <div class="col-4">
            <div class="row align-items-end" style="height: 80px;">
                <div class="col-2">
                </div>
                <div class="col-10">
                    <div class="num-box mt80">
                        <ul class="number_btn">
                            @foreach($menu as $d)
                            <li><a 
                                href="{{$d['url']}}"
                                class="{{$d['class']}}"
                                v-on:click="{{$d['vonclick']}}">
                                    <div>
                                        <p>{{$d['name']}}</p>
                                    </div>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <ul class="mode_btn">
                            <li><a href="javascript:void(0);" class="btn_col02" v-on:click="onNumMode">
                                    <div><p>set Time</p></div>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

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
        <button type="button" class="btn btn-warning common-btn" v-on:click="onReapply">Reapply</button>
    </div>
    <div class="position-absolute bottom-0 end-0">
        <button type="button" class="btn btn-success common-btn" v-on:click="onConfirm">Confirm</button>
    </div>


</div>
<script src="{{asset('/js/time.js')}}"></script>

@endsection