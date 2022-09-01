<!DOCTYPE html>
<html lang="ja">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ユーザ一覧</title>
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<body>



   <h1>Userlist</h1>
   <button class="btn btn-primary" id="send" type="button" onClick="history.back()">back</button>

   <table class="table table-hover table-primary">
      <thead>
         <tr>
            <th scope="col">No</th>
            <th scope="col">Name</th>
            <th scope="col">e-mail</th>
            <th scope="col">Position</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
         </tr>
      </thead>
      <tbody>
         @foreach($Users as $User)

         <tr>
            <th scope="row">{{$User->id}}.</th>
            <td>{{$User->name}}</td>
            <td>{{$User->email}}</td>

            <td>

               @if($User->roll===1)
               <p>現:管理者</p>
               @elseif($User->roll===2)
               <p>現:卒業生</p>
               @elseif($User->roll===3)
               <p>現:受講生</p>
               @endif

            </td>

            <td>
               <a class="btn btn-primary" href="/admin/list/{{$User->id}}">編集</a>
            </td>

            <td>
               <form action="{{route('delete')}}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$User->id}}">

                  <input type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか')" value="削除">
               </form>
            </td>


         </tr>

         @endforeach

      </tbody>
   </table>
</body>

</html>