<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Role;
use App\MorphicComments;
use App\Pages;
use App\Comment;
use App\Feedback;
class UserController extends Controller
{
    //
public function index(){
//$user = User::with('getPost','getAddress')->get();
//dd($user);
$users = User::all();
$disRoles = Role::all();
//$user = User::find(1);	
  //print("<pre>");
//print_r(($user->roles->toArray()));
//dd($user->roles);
return view('feedback.listing', compact('users'));

//return $users;
//$comments = User::all();
//return $comments;
  // getting the model...
  //var_dump($morphic_comments->commentable);
// MorphicComments::create([
//     'comment_type' => 'App/Pages',
//     'comment_id' => 2,
//     'body' => 'hhhty fsfs btw sf'
// ]);

}
public function getmsg(){
      $msg = "This is a simple message.";
      return response()->json(array('msg'=> $msg), 200);
}
public static function getCommentData($id)
{   
    $post = Post::with('getComment')->find($id);
    return $post->getComment;
}
public static function getTotalPost($id){
    $matchThese = ['user_id' => $id];
    $totalpost = Post::where($matchThese)->get()->count();
    return $totalpost;
}
public static function  getAllroles($id){
    $user = User::find($id);	
    return $user->roles;
}
//get All user listing
public static function getAllusers($id){
    $user = Role::find($id);	
    return $user->users;
}

public function insertFeedback(Request $request){
    $Feedback = new Feedback();
    $Feedback->user_id =$request->input('user_id');
    $Feedback->feedback = $request->input('feedback');
    
    $Feedback->save();
}

}