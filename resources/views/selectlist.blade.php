@extends('layouts.common')

@section('title', 'レース選択画面')

@section('content')
<!--
<h1>レース選択画面</h1>
-->
<div class="box01 mt80">
    <ul class="menu_btn">
        @foreach($menu as $d)
        <li><a 
            href="{{url($d['url'])}}"
            class="{{$d['class']}}">
                <div>
                    <p>{{$d['name']}}</p>
                    @if($d['sub_name'])
                        {!! preg_replace('/([^,]+),?/is', '<span>$1</span>', $d['sub_name']) !!} 
                    @endif
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>

@endsection