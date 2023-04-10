<?php $ta ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="{{asset('js/app.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
  <title> ログイン画面</title>
</head>

<body class="text-center">

    <main class="form-signin">

        <img src="{{ asset('img/Group 11.png') }}" alt="">
        
        <form method="post" action="{{route('login')}}">
          @CSRF
          
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            @if (session('login_error'))
            <div>
                {{session('login_error')}}
            </div>
            @endif
            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li  class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>


            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>


        </form>
        <p>Passwordを忘れた方は
          <a href="{{route('forget')}}">こちら</a>
          
        </p>
  </main>



</body>

</html>