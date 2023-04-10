<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Goods;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Response;





class AuthController extends Controller
{
    // @return View
    public function ShowLogin()
    {
        return view('login');
    }
    public function top()
    {
        return view('question.Top.top');
    }

    public function forget()
    {
        return view('question-app.forgetLogin');
    }

    public function login(LoginFormRequest $request)
    {
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('Top');
        }

        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが間違っています。',
        ]);
    }


    // 登録画面遷移
    public function entry()
    {
        return view('question-app.admin.userentry');
    }


    public function admin()
    {
        return view('question-app.post.admin');
    }


    //    ユーザ一覧画面遷移
    public function list()
    {
        $Users = User::all();



        return view(
            'question-app.admin.userslist',
            ['Users' => $Users]
        );
    }

    public function detail($id)
    {
        $User = User::find($id);

        return view(
            'question-app.admin.userdetail',
            ['User' => $User]
        );

        if (is_null($User)) {
            return redirect(route('list'));
        }
    }
    public function edit($id)
    {
        $User = User::find($id);

        return view(
            'question-app.admin.useredit',
            ['User' => $User]
        );

        if (is_null($User)) {
            return redirect(route('list'));
        }
    }

    public function create(LoginFormRequest $request)
    {

        $input = $request->all();


        // dd($input);
        DB::beginTransaction();
        try {
            User::create($input);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();

            abort(500);
        }
        return  redirect('admin');
    }

    public function update(LoginFormRequest $request)
    {

        $input = $request->all();
        //    dd($input);
        DB::beginTransaction();
        try {
            $User = User::find($input['id']);
            $User->fill([
                'name' => $input['name'],
                'email' => $input['email'],
                'roll' => $input['roll']
            ]);

            $User->fill([
                'password' => Hash::make($input['password'])
            ])->save();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();

            abort(500);
        }
        return  redirect('/admin');
    }

    /**
     * ユーザーをアプリケーションからログアウトさせる
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $input = $request->all();
        //  dd($input);
        DB::beginTransaction();
        try {
            $Qdelete = User::find($input['id']);
            $Qdelete->delete();


            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();

            abort(500);
        }
        return  redirect('admin/list');
    }


    public function idName()
    {

        $userJoins = DB::table('users')
            ->join('question', 'users.id', '=', 'question.user_id')
            ->orderBy('question.id', 'desc')
            ->get();

        // dd($user_id);

        $good_model = new Goods;


        return view('question-app.post.admin', compact('userJoins', 'good_model'));
    }

    public function solution(Request $request)
    {
        $solution = $request->all();
        $res_res_id = $solution['res_res_id'];
        // dd($solution);
        DB::beginTransaction();
        try {
            Response::create($solution);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }
        $userJoins = DB::table('users')
            ->join('question', 'users.id', '=', 'question.user_id')
            ->orderBy('question.id', 'desc')
            ->get();
        // dd($userJoins);

        // dd($Rcount);


        return redirect('/admin');
    }

    public function good(Request $request)
    {
        $user_id = Auth::user()->id;
        $input = $request->all();
        $question_id = $request->good_id;
        // dd($input);

        $already_good =  DB::table('good')->where('user_id', $user_id)->where('question_id', $question_id)->first();
        if (!$already_good) {
            DB::table('good')->insert([
                'user_id' => $user_id,
                'question_id' => $question_id
            ]);
        } else {
            DB::table('good')->where('user_id', $user_id)->where('question_id', $question_id)->delete();
        }

        return  redirect('/admin');
    }
}
