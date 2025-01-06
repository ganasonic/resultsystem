<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'リザルトシステム') }}</title>

        <!-- 以下がないとエアジャッジが上手く動作しない？-->
        <script src="{{asset('/js/jquery-3.6.0.min.js')}}" defer></script>
    <!--
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    -->
        <script src="{{asset('/js/vue.js')}}" defer></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <!---->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/gana.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>
    </head>



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
-->
<script src="{{asset('/js/jquery-3.6.0.min.js')}}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- タブを使うのに以下が必要？ -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"/>
    <!-- Bootstrap用JavaScriptの読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>




        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/gana.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <script src="{{asset('/js/jquery-3.6.0.min.js')}}" defer></script>
        <script src="{{asset('/js/vue.js')}}" defer></script>
        <script src="{{asset('/js/bootstrap.min.js')}}" defer></script>
        <script src="{{asset('/js/bootstrap.bundle.min.js')}}" defer></script>

        @if (Route::has('login'))
        @auth
        <!--
            <div class="container">
                <div class="row">
                    <div class="col-1">
                    <h4>No</h4>
                    </div>
                    <div class="col-1">
                    <h4>BIB</h4>
                    </div>
                    <div class="col-4">
                    <h4>選手氏名</h4>
                    </div>
                    <div class="col-2">
                    <h4>県連</h4>
                    </div>
                    <div class="col-4">
                    <h4>所得チーム</h4>
                    </div>
                </div>
            </div>
        -->
        @endauth
    @endif
