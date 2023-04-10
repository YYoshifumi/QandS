        <div class="side-bar">
            <img src="{{ asset('img/Group 11.png') }}" alt="">
            <h1>
                <!-- ココ改善 -->
                @yield('side_menu_title')
            </h1>
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
                <form action="{{route('Question')}}" method="post">
                    @CSRF
                    <input class="btn btn-primary" type="submit" value="投稿">
                </form>

                @can('admin')
                <a class="btn btn-primary" href="{{route('Entry')}}">ユーザ一登録</a>
                <br>
                <a class="btn btn-primary" href="{{route('List')}}">ユーザ一覧</a>
                @endcan
                <form action="{{route('logout')}}" method="post">
                    @CSRF
                    <input class="btn btn-primary LOGOUT" type="submit" value='LOGOUT'>
                </form>
            </div>
        </div>