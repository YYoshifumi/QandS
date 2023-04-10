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

    public function question()
    {
        return view('question.user.Qusetion');
    }

}
