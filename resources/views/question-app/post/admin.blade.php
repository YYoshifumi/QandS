<?php

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Q.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <script src="{{asset('js/app.js') }}"></script>
    <script src="{{asset('js/Q.js') }}"></script>
    <title>home画面</title>
</head>

<body>

    <div class="all">
        <div class="side-bar">
            <img src="{{ asset('img/Group 11.png') }}" alt="">
            <h1>home画面</h1>
            <h4 class="name">名前：{{Auth::user()->name}}さん</h4>
            <h3>

                @if(Auth::user()->roll == 1)

                管理者

                @elseif(Auth::user()->roll == 2)

                卒業生

                @elseif(Auth::user()->roll == 3)

                受講生

                @endif

            </h3>
            <div class="side-bar-button">
                <form action="{{route('question')}}" method="post">
                    @CSRF
                    <input type="hidden" name="roll" value="{{Auth::user()->id}}">
                    <input type="hidden" name="id" value="{{Auth::user()->name}}">
                    <input class="btn btn-primary" type="submit" value="投稿">
                </form>

                @can('admin')
                <a class="btn btn-primary" href="{{route('entry')}}">ユーザ一登録</a>
                <br>
                <a class="btn btn-primary" href="{{route('list')}}">ユーザ一覧</a>
                @endcan
                <form action="{{route('logout')}}" method="post">
                    @CSRF
                    <input class="btn btn-primary LOGOUT" type="submit" value='LOGOUT'>
                </form>
            </div>
        </div>
        <!-- 返信一覧 -->

        <div class="q-contents" style="width:100%">
            @foreach($userJoins as $userJoin)
            <div class="card" style="margin-bottom:3% ; padding:3%;">
                <div>
                    <h3>{{$userJoin->id}}.</h3>
                    @can('admin')
                    <h5>ID:{{$userJoin->user_id}} {{$userJoin->name}}さん</h5>

                    @endcan

                </div>
                <h4 class="card-title">質問：<br>{{$userJoin->title}}</h4>

                <p class="card-text">質問内容：<br>{!! nl2br(htmlspecialchars($userJoin->question_contents)) !!}</p>

                <div class="Q-button">

                    <!-- <i class="bi bi-heart-fill switch "></i> -->

                    <!-- zikkenn  -->

                    @if($good_model->good_exist(Auth::user()->id,$userJoin->id))

                    <i class="switch heart bi bi-heart-fill click " data-good_id="{{ $userJoin->id }}"></i>

                    @else

                    <i class="switch heart bi bi-heart-fill " data-good_id="{{ $userJoin->id }}"></i>
                    @endif



                    <form class="switch" action="{{route('response')}}" method="post">
                        <!-- 返信 -->
                        @csrf
                        <input type="hidden" name="title" value="{{$userJoin->title}}">
                        <input type="hidden" name="question_contents" value="{{$userJoin->question_contents}}">
                        <input type="hidden" name="user_id" value="">
                        <input type="hidden" name="res_res_id" value="{{$userJoin->id}}">
                        <input class="btn btn-primary switch" type="submit" value="返信+">
                    </form>


                    @if($userJoin->user_id == Auth::user()->id)
                    <form class="switch" action="{{route('Qedit')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$userJoin->id}}">
                        <input class="btn btn-primary switch" type="submit" value="編集">
                    </form>

                    <form class="switch" action="{{route('Qdelete')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$userJoin->id}}">
                        <input class=" btn btn-danger switch" type="submit" onclick="return confirm('本当に削除しますか')" value="削除">
                    </form>

                    @endif
                </div>
                <br>
            </div>

            @endforeach
        </div>
    </div>
</body>

</html>