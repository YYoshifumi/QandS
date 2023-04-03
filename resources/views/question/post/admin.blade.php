
<!DOCTYPE html>
<html lang="ja">
@extends('question.layout.head')
@section('head_title','HOME')
<!-- head -->


<body>
@extends('question.layout.side_menu')
@section('side_menu_title','HOME')
<!-- sidemenu -->

    <div class="all">
        <!-- sidebar -->
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