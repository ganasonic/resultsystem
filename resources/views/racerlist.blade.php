@extends('layouts.common')

@section('title', '設定画面')

@section('content')
<table class="table">
<thead class="sticky-top bg-white">
<tr>
<th>No</th>
<th>BIB</th>
<th>SAJ</th>
<th>FIS</th>
<th>名前</th>
<th>県連</th>
<th>所属</th>
<th>SAJ PT</th>
<th>FIS PT</th>
</tr>
</thead>
<tbody>
@foreach($racerlists as $racerlist)
<tr>
<td>{{$racerlist->通番}}</td>
<td>{{$racerlist->BIB}}</td>
<td>{{$racerlist->SAJNO}}</td>
<td>{{$racerlist->FISNO}}</td>
<td>{{$racerlist->氏名漢}}</td>
<td>{{$racerlist->県連盟}}</td>
<td>{{$racerlist->所属}}</td>
<td>{{$racerlist->SAJ_MOﾎﾟｲﾝﾄ}}</td>
<td>{{$racerlist->FIS_MOﾎﾟｲﾝﾄ}}</td>
</tr>
@endforeach
</tbody>
</table>


@endsection