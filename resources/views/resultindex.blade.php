@extends('layouts.common')

@section('title', 'リザルト表示画面')

@section('content')
<!--
<h1>リザルト表示画面</h1>
-->
<div class="row">
        <ul class="menu_btn">
            @foreach($menuq as $d)
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
    <div class="row">
        <ul class="menu_btn">
            @foreach($menuf as $d)
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
<div class="box01 mt80">
</div>

@endsection