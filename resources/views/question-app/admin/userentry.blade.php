<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録画面</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body class="text-center">

  <main class="form-signin">

    <div class="All">
      <h1>登録画面</h1>
      <div class="please">
      </div>
      <!-- action記入 -->
      <form class="" action="{{route('create')}}" method="POST">
        @CSRF

        <dl class="must-input">
          @if (session('err_msg'))
          <div class="text-danger">
            {{ session('err_msg')}}
          </div>
          @endif
          <div class="form-group">
            <label> 名前<span>*</span></label>
            <input id="name" name="name" class="form-control" value="" type="text" placeholder="山田太郎">
            @if ($errors->has('name'))
            <div class="text-danger">
              {{ $errors->first('name') }}
            </div>
            @endif
          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> メールアドレス<span>*</span></label>
            <input id="exampleInputEmail1" name="email" class="form-control" value="" type="email" aria-describedby="emailHelp" placeholder="test@123.com">
            @if ($errors->has('email'))
            <div class="text-danger">
              {{ $errors->first('email') }}
            </div>
            @endif
          </div>

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label"> Password<span>*</span></label>
            <input id="exampleInputPassword1" name="password" class="form-control" value="" type="password" placeholder="1234567abcd">
            @if ($errors->has('password'))
            <div class="text-danger">
              {{ $errors->first('password') }}
            </div>
            @endif
          </div>

    </div>
    </dl>





    <input type="hidden" name="roll" value="3">
    <div class="Send">
      <button class="btn btn-primary" id="send" type="submit" onclick="return confirm('本当に登録しますか')">登録</button>
      <button class="btn btn-primary" id="send" type="button" onClick="history.back()">キャンセル</button>
    </div>
    </form>

    </div>

  </main>
</body>

</html>