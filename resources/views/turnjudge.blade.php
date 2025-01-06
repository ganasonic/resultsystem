@extends('layouts.app')

@section('title', 'ターンジャッジ画面')

@section('content')
<div class="container" id="turn">

    <!--base-->
    <div class="row">
        <div class="col-2">
            <h5>Base Point</h5><span class="level-font">@{{ loadLevelStringTurnBase(base_point) }}</span>
        </div>
        <div class="col-2">
            <input type="text" disabled class="form-control" style="font-size: 2.0rem;" v-bind:value="base_point">
        </div>            
        <div class="col-2">
            <h5>Deduction</h5>
        </div>
        <div class="col-2">
            <input type="text" disabled class="form-control" style="font-size: 2.0rem;" v-bind:value="deduction">
        </div>            
        <div class="col-2">
            <h5>Turn Point</h5>
        </div>
        <div class="col-2">
            <input type="text" disabled class="form-control" style="font-size: 2.0rem;" v-bind:value="turn_point">
        </div>            
    </div>

    <!-- 空行 -->
    <div class="row" style="height:30px;">
        <div class="col-9">
            <label class="form-label"></label>
        </div>
    </div>

    <!--ターン要素-->
    <div class="row">
        <div class="col-7">
            <div class="row">
                <div class="col-6">
                    <h5>Carving</h5>
                    <input type="range" class="form-range" min="0" max="8" step="0.1" id="curvingpoint" style="width: 100%;" v-model.number="carving_point" v-on:change="onCarving">
                </div>
                <div class="col-3">
                    <span class="level-font">@{{ loadLevelStringC(carving_point) }}</span>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" style="font-size: 1.6rem; text-align: center;" v-bind:value="carving_point">
                </div>
            </div>
            <!-- 空行 -->
            <div class="row" style="height:20px;">
                <div class="col-5">
                    <label class="form-label"></label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h5>Abs/Ext</h5>
                    <input type="range" class="form-range" min="0" max="6" step="0.1" id="absextpoint" style="width: 100%;" v-model.number="absext_point" v-on:change="onAbsext">
                </div>
                <div class="col-3">
                    <span class="level-font">@{{ loadLevelStringAEU(absext_point) }}</span>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" style="font-size: 1.6rem; text-align: center;" v-bind:value="absext_point">
                </div>
            </div>
            <!-- 空行 -->
            <div class="row" style="height:20px;">
                <div class="col-5">
                    <label class="form-label"></label>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h5>Upper Body</h5>
                    <input type="range" class="form-range" min="0" max="6" step="0.1" id="upperpoint" style="width: 100%;" v-model.number="upper_point" v-on:change="onUpper">
                </div>
                <div class="col-3">
                    <span class="level-font">@{{ loadLevelStringAEU(upper_point) }}</span>
                </div>
                <div class="col-3">
                    <input type="text" class="form-control" style="font-size: 1.6rem; text-align: center;" v-bind:value="upper_point">
                </div>
            </div>
        </div>

        <div class="col-1">

        </div>

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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--ボタン-->
    <div class="row" style="height:100px;">
    </div>


    <!-- 空行 -->
    <div class="row" style="height:20px;">
        <div class="col-9">
            <label class="form-label"></label>
        </div>
    </div>
<!--    



    <div class="row">
        <div class="col-8">
            <label class="form-label"></label>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-warning" style="width: 100%;" v-on:click="onReapply">Reapply</button>
        </div>
        <div class="col-2">
            <button type="button" class="btn btn-success" style="width: 100%;" v-on:click="onConfirm">Confirm</button>
        </div>
    </div>
-->


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
    <!--
    <div class="position-relative">
        <div class="col-8">
            <label class="form-label"></label>
        </div>
        <div class="col-2">
            <div class="position-absolute bottom-0 start-50 translate-middle-x">
                <button type="button" class="btn btn-warning" style="width: 100%;" v-on:click="onReapply">Reapply</button>
            </div>
        </div>
        <div class="col-2">
            <div class="position-absolute bottom-0 end-0">
                <button type="button" class="btn btn-success" style="width: 100%;" v-on:click="onConfirm">Confirm</button>
            </div>
        </div>
    </div>
-->
</div>
<script src="{{asset('/js/turn.js')}}"></script>
@endsection