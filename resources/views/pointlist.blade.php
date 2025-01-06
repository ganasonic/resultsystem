@extends('layouts.common')

@section('title', '設定画面')

@section('content')
<table class="table">
<thead class="sticky-top bg-white">
<tr>
<th>SAJ</th>
<th>FIS</th>
<th>名前</th>
<th>NAME</th>
<th>県連</th>
<th>所属</th>
<th>SAJ PT</th>
<th>FIS PT</th>
</tr>
</thead>
<tbody>
@foreach($pointlists as $pointlist)
<tr>
<td>{{$pointlist->SAJNO}}</td>
<td>{{$pointlist->FISNO}}</td>
<td>{{$pointlist->氏名漢}}</td>
<td>{{$pointlist->氏名R}}</td>
<td>{{$pointlist->県連盟}}</td>
<td>{{$pointlist->所属}}</td>
<td>{{$pointlist->SAJ_MOﾎﾟｲﾝﾄ}}</td>
<td>{{$pointlist->FIS_MOﾎﾟｲﾝﾄ}}</td>
</tr>
@endforeach
</tbody>
</table>


@endsection