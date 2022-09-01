<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Http\Requests\moveRequest;
use App\Models\Question;
use App\Models\Response;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{


   public function question(Request $request)
   {
      $roll = $request->roll;
      $id = $request->id;
      $input_data = ['roll' => $roll, 'id' => $id];
      //  dd($id);
      return view('question-app.question', ['roll' => $roll, 'id' => $id]);
   }

   public function idName()
   {
      $userJoins = DB::table('users')
         ->join('question', 'users.id', '=', 'question.user_id')
         ->orderBy('question.id', 'desc')
         ->get();
      // dd($userJoins);

      return view('question-app.post.admin', compact('userJoins'));
   }

   public function solution(Request $request)
   {
      $solution = $request->all();
      $res_res_id = $solution['res_res_id'];
      //  dd($solution);
      DB::beginTransaction();
      try {

         Response::create($solution);

         DB::commit();
      } catch (\Throwable $e) {
         DB::rollback();

         abort(500);
      }
      $Rcount = DB::table('response')
         ->where('res_res_id', $res_res_id)
         ->count();

      $userJoins = DB::table('users')
         ->join('question', 'users.id', '=', 'question.user_id')
         ->orderBy('question.id', 'desc')
         ->get();
      // dd($userJoins);

      // dd($Rcount);


      return view('question-app.post.admin', compact('Rcount'));
   }

   public function Qentry(Request $request)
   {
      $roll = $request->roll;
      $id = $request->id;
      $input_data = ['roll' => $roll, 'id' => $id];

      $input = $request->all();

      //  dd($input);



      DB::beginTransaction();
      try {
         Question::create($input);

         DB::commit();
      } catch (\Throwable $e) {
         DB::rollback();

         abort(500);
      }

      return redirect('admin');
   }

   public function Qedit(Request $request)
   {
      $inputs = $request->all();
      $id = $request["id"];

      $Qedits = Question::find($id);

      // dd($find);
      return  view('question-app.Qedit', ['Qedits' => $Qedits]);
   }

   public function Qupdate(Request $request)
   {
      $input = $request->all();
      // dd($input);
      DB::beginTransaction();
      try {
         $Question = Question::find($input['id']);
         // dd($Question);

         $Question->fill([
            'title' => $input['title'],
            'question_contents' => $input['question_contents'],
         ])->save();


         DB::commit();
      } catch (\Throwable $e) {
         DB::rollback();

         abort(500);
      }
      return  redirect('/admin');
   }

   public function Qdelete(Request $request)
   {
      $input = $request->all();
      // dd($input);
      DB::beginTransaction();
      try {
         $Qdelete = Question::find($input['id']);
         $Qdelete->delete();


         DB::commit();
      } catch (\Throwable $e) {
         DB::rollback();

         abort(500);
      }
      return  redirect('/admin');
   }
}
