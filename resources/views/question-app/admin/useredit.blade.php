<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="{{ asset('js/app.js') }}" defer></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<section>
<div class="All">
 
  </div>
<!-- action記入 -->
  <form class="" action="{{route('update')}}" method="POST" >
@CSRF

  <dl class="must-input">
  @if (session('err_msg'))
         <div class="text-danger">
         {{ session('err_msg')}}
         </div>
  @endif
  <div class="form-group">
  <h3> 名前</h3>
                <input
                    id="name"
                    name="name"
                    class="form-control"
                    value="{{$User->name }}"
                    type="text"
                    placeholder="山田太郎"
                >
                @if ($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

  <div class="form-group">
  <h3> メールアドレス</h3>
                <input
                    id="email"
                    name="email"
                    class="form-control"
                    value="{{$User->email}}"
                    type="text"
                    placeholder="test@123.com"
                >
                @if ($errors->has('email'))
                    <div class="text-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>
<h3> 役職</h3>
            <select name="roll">
  <option value="{{$User->roll}} " selected>
  現:
  @if($User->roll===1) 
   <p>管理者</p>
   @elseif($User->roll===2)
   <p>卒業生</p>
   @elseif($User->roll===3)
   <p>受講生</p>
   @endif
  </option>        
  <option value="1">管理者</option>
  <option value="2">卒業生</option>
  <option value="3">受講生</option>
</select>  

<h3> パスワード<span>*</span></h3>
                <input
                    id="password"
                    name="password"
                    class="form-control"
                    value=""
                    type="text"
                    placeholder="1234567abcd"
                >
                @if ($errors->has('password'))
                    <div class="text-danger">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
  </dl>
  </dl>

  </div>
<input type="hidden" name="id" value="{{$User->id}}" >
  <div class="Send">
  <button class="btn btn-primary" id="send" type="submit" onclick="return confirm('本当に更新しますか')" >更新</button>  
    
</div>
  </form>

  <form action="" method="post">
  @CSRF
  <button class="btn btn-primary" id="send" type="submit">キャンセル</button>
  </form>

</div>
</section>
</html>