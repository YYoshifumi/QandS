<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
    <title> 質問編集画面</title>
</head>

<body class="text-center">
    <main class="form-signin">
        <div class="form">
            <div class="col-md-8 col-md-offset-2">
                <h2>質問編集</h2>
                <form method="post" action="{{route('Qupdate')}}" onSubmit="return checkSubmit()">
                    @CSRF
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <input id="title" name="title" class="form-control" value="{{$Qedits['title']}}" type="text">
                        @if ($errors->has('title'))
                        <div class="text-danger">
                            {{ $errors->first('title') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <!-- <label for="content"></label> -->

                        <label for="content">
                            内容
                        </label>
                        <textarea name="question_contents" class="form-control" rows="4">{{$Qedits['question_contents']}}</textarea>
                        @if ($errors->has('content'))
                        <div class="text-danger">
                            {{ $errors->first('content') }}
                        </div>
                        @endif
                    </div>

                    <div class="mt-5">
                        <input type="hidden" name="id" value="{{$Qedits['id']}}">

                        <input type="submit" class="btn btn-primary" value="編集">

                        <button class="btn btn-primary" id="send" type="button" onClick="history.back()">キャンセル</button>

                    </div>
                </form>



            </div>
        </div>

    </main>
</body>
<script>
    function checkSubmit() {
        if (window.confirm('投稿してよろしいですか？')) {
            return true;
        } else {
            return false;
        }
    }
</script>