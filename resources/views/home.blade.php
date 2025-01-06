@extends('layouts.common')

@section('content')

<main>
<div class="row">
            <ul class="menu_btn">
                @foreach($menu1 as $d)
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
                @foreach($menu2 as $d)
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
                @foreach($menu3 as $d)
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
<!--
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
        リザルトシステム
        </div>

        <div class="box01 mt80">
            <ul class="menu_btn">
                @foreach($menu1 as $d)
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

    </div>
</div>
-->
</main>
@endsection
