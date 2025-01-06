@extends('layouts.app')

@section('title', '設定画面')

@section('content')
<div class="container" id="processrace">
  <h2>レース進行画面</h2><h4>初回は対象選手を選択してください。</h4>

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
<div>
    <b-button variant="outline-primary" v-on:click="onGetStart">取得</b-button>
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
      :items="{{ @items }}"
      select-mode="single"
      selectable
      primary-key="url"
      @row-selected="onRowSelected"
      ></b-table>
  </div>

  <div v-if="status == 'selected'" class="row sticky-bottom navbar-expand-xl bg-warning">
      <div class="row text-white">
          <div class="col-1">
          <span class="footer-font">@{{ start }}</span>
          </div>
          <div class="col-1">
          <span class="footer-font">@{{ bib }}</span>
          </div>
          <div class="col-4">
          <span class="footer-font">@{{ name }}</span>
          </div>
          <div class="col-2">
          <span class="footer-font">@{{ pref }}</span>
          </div>
          <div class="col-4">
          <span class="footer-font">@{{ team }}</span>
          </div>
      </div>
  </div>
  <div v-else-if="status == 'failed'" class="row sticky-bottom navbar-expand-xl bg-danger">
      <div class="row text-white">
          <div class="col-1">
          <span class="footer-font">@{{ start }}</span>
          </div>
          <div class="col-1">
          <span class="footer-font">@{{ bib }}</span>
          </div>
          <div class="col-4">
          <span class="footer-font">@{{ name }}</span>
          </div>
          <div class="col-2">
          <span class="footer-font">@{{ pref }}</span>
          </div>
          <div class="col-4">
          <span class="footer-font">@{{ team }}</span>
          </div>
      </div>
  </div>
  <div v-else class="row sticky-bottom navbar-expand-xl bg-success">
      <div class="row text-white">
          <div class="col-1">
          <span class="footer-font">@{{ start }}</span>
          </div>
          <div class="col-1">
          <span class="footer-font">@{{ bib }}</span>
          </div>
          <div class="col-4">
          <span class="footer-font">@{{ name }}</span>
          </div>
          <div class="col-2">
          <span class="footer-font">@{{ pref }}</span>
          </div>
          <div class="col-4">
          <span class="footer-font">@{{ team }}</span>
          </div>
      </div>
  </div>


  </template>
</div>

<script src="{{asset('/js/app.js')}}"></script>
<script src="{{asset('/js/processrace.js')}}"></script>
@endsection

