<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{asset('js/app.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">
    <title>Document</title>
</head>

<body>

    <div class="center-block">
        <form action="" method="POST">

            <!-- valueは考える。-->
            <div class="form-group">
                <h3> E-mail:<span></span></h3>
                <input id="email" name="email" class="" type="text" placeholder="">

                <!--  @if ($errors->has('id'))
                    <div class="text-danger">
                        {{$errors->first('id')}}
                    </div>
               @endif-->

            </div>
            <div class="form-group">
                <h3> ID:<span></span></h3>
                <input id="Password" name="Password" class="password" type="text" placeholder="">

                <!--  @if ($errors->has('id'))
                    <div class="text-danger">
                        {{ $errors->first('kana') }}
                    </div>
                @endif -->

            </div>
            <div class="form-group">
                <h3> Password:<span></span></h3>
                <input id="password" name="password" class="password" type="text" placeholder="">

                <!--  @if ($errors->has('id'))
                    <div class="text-danger">
                        {{$errors->first('id')}}
                    </div>
               @endif-->

            </div>
            <div class="form-group">
                <h3> Password:<br>再入力<span></span></h3>
                <input id="password2" name="password2" class="password2" type="text" placeholder="">

                <!--  @if ($errors->has('id'))
                    <div class="text-danger">
                        {{$errors->first('id')}}
                    </div>
               @endif-->

            </div>

            <input type="submit" name="submit" value="SIGN UP">
        </form>
    </div>


</body>

</html>