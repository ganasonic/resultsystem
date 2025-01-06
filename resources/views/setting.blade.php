@extends('layouts.common')

@section('title', '設定画面')

@section('content')
<!--
<h1>設定画面</h1>
-->

<ul>
<li><a href="/pointlist/m">男子一覧画面</a></li>
<li><a href="/pointlist/f">女子一覧画面</a></li>
<li><a href="/currentresult/create">初回カレントリザルト初期化</a></li>
<li><a href="/currentdmresult/store">初回DMカレントリザルト初期化</a></li>
<li><a href="/currentresult/testinsert">テストデータ適用</a></li>
<li><a href="/upload">DB登録（エクセルアップロード）</a></li>
<li><a href="/register">新規ユーザ登録</a></li>
<li><a href="/test">レース進行（b-tableテスト）</a></li>
</ul>


@endsection