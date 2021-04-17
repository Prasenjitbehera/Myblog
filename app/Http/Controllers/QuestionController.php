<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question_type;
class QuestionController extends Controller
{
    //
    public function getmsg(){
        return response()->json(Question_type::all()); 
  }
}
