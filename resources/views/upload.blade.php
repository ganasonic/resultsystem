@extends('layouts.common')

@section('title', '設定画面')

@section('content')
<!doctype html>
<form method="POST" action="/uploadlist" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="uploadkind" id="uploadkindracerlist" value="racerlist">
        <label class="form-check-label" for="uploadkindracerlist">エントリーリスト</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="uploadkind" id="uploadkindairdd" value="airdd">
        <label class="form-check-label" for="uploadkindairdd">モーグル難度</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="uploadkind" id="uploadkindraceinfo" value="raceinfo">
        <label class="form-check-label" for="uploadkindraceinfo">大会情報パラメータ</label>
    </div>

    <div class="input-group mb-3">
        <input type="file" class="form-control" id="file" name="file" aria-describedby="file" aria-label="Upload">
        <button class="btn btn-outline-secondary" type="submit" id="file">アップロード</button>
    </div>
</form>
@endsection
