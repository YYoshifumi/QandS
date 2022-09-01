<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\moveRequest;
use App\Models\Response;
use App\Models\Goods;
use App\Models\Question;
use Illuminate\Support\Facades\DB;

class ResponseController extends Controller
{

  public function response(Request $request)
  {
    $R = $request->all();
    // dd($R);
    $res_res_id = $R['res_res_id'];

    $Rlist = DB::table('response')
      ->join('users', 'users.id', '=', 'response.user_id')
      ->where('res_res_id', $res_res_id)
      ->get();

    return view('question-app.response', compact('R', 'Rlist'));
  }




  public function Rdelete(Request $request)
  {
    $input = $request->all();
    // dd($input);
    DB::beginTransaction();
    try {
      $Qdelete = DB::table('response')
        ->where('response_contents', $input['response_contents'])
        ->delete();


      DB::commit();
    } catch (\Throwable $e) {
      DB::rollback();

      abort(500);
    }
    return  redirect('/admin/response');
  }
}
