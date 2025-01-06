@extends('layouts.common')

@section('title', '初回カレントデータ設定画面')

@section('content')

<form method="POST" action="{{route('currentresult.store')}}">
  @csrf

  <div>
    <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="sex" id="labelFemale" value="F">
          <label class="form-check-label" for="labelFemale">女子</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="sex" id="labelMale" value="M">
          <label class="form-check-label" for="labelMale">男子</label>
        </div>

  </div>

  <div>
    <label for="form-class">クラス</label>
    <input type="text" name="class" id="form-class">
  </div>

  <div>
    <label for="form-season">シーズン</label>
    <input type="text" name="season" id="form-season">
  </div>

  <div>
    <label for="form-codex">CODEX</label>
    <input type="text" name="codex" id="form-codex">
  </div>

  <div>
    <label for="form-sajno">SAJ NO</label>
    <input type="text" name="sajno" id="form-sajno">
  </div>

  <div>
    <label for="form-name">選手名</label>
    <input type="text" name="name" id="form-name">
  </div>

  <div>
    <label for="form-bib">BIB</label>
    <input type="text" name="bib" id="form-bib">
  </div>



  <div>
    <label for="form-pref">県連</label>
    <input type="text" name="pref" id="form-pref">
  </div>

  <div>
    <label for="form-team">チーム</label>
    <input type="text" name="team" id="form-team">
  </div>


  <button type="submit">登録</button>

</form>

@endsection
