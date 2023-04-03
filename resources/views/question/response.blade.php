<!DOCTYPE html>
<html lang="ja">

<!-- head -->

<body class="text-center">
    <main class="form-signin">
        <div class="">

            <form method="post" action="{{route('solution')}}" onSubmit="return checkSubmit()">
                @CSRF
                <h2>返信フォーム</h2>

                <div class="form-group">
                

                    <label>質問</label>
                    <h3>{{$Rt=$R["title"]}}
                        <h3>
                            <p>{{$R["question_contents"]}}</p>

                            <label>返信入力</label>

                            <textarea name="response_contents" class="form-control"></textarea>
                            @if ($errors->has('content'))
                            <div class="text-danger">
                                {{ $errors->first('content') }}
                            </div>
                            @endif
                </div>

                <div class="mt-5">
                    <input type="hidden" name="good" value="0">
                    <input type="hidden" name="res_res_id" value="{{$R["res_res_id"]}}">
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                    <button type="submit" class="btn btn-primary">
                        返信する
                    </button>
                    <button class="btn btn-primary" id="send" type="button" onClick="history.back()">キャンセル</button>

                </div>
            </form>


            <table class="table table-hover table-primary ">
                <thead>
                    <tr>
                        
                        @can('admin')
                        <th scope="col">Name</th>
                        <th scope="col">ID</th>
                        @endcan
                        <th scope="col">Position</th>
                        <th scope="col">comment</th>
                        <th scope="col">edit</th>
                        <th scope="col">delete</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach($Rlist as $rlist)
                    <tr>
                        
                        @can('admin')
                        <td>{{$rlist->name}}</td>
                        <td>ID:{{$rlist->user_id}}</td>
                        @endcan
                        <td>@if($rlist->roll == 1)

                            管理者
                            @elseif($rlist->roll == 2)

                            卒業生

                            @elseif($rlist->roll == 3)

                            受講生

                            @endif
                        </td>
                        <td>{!! nl2br(htmlspecialchars($rlist->response_contents)) !!}</td>
                        @if($rlist->user_id == Auth::user()->id)
                        <td>
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$rlist->id}}">
                                <input class="btn btn-primary switch" type="submit" value="編集">
                            </form>
                        </td>
                        <td>
                            <form action="{{route('Rdelete')}}" method="post">
                                @csrf
                                <input type="hidden" name="response_contents" value="{{$rlist->response_contents}}">
                                <input type="hidden" name="id" value="{{$rlist->id}}">
                                <input class="btn btn-danger switch" type="submit" onclick="return confirm('本当に削除しますか')" value="削除">
                            </form>
                        </td>
                        @endif
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </main>


    <script>
        function checkSubmit() {
            if (window.confirm('投稿してよろしいですか？')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>