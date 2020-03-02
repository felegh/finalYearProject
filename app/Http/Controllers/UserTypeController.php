<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use DB;

class UserTypeController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    //
    public function change(){
      $userid = Auth::id();
      $userId = DB::select('SELECT * FROM users WHERE id = ?', [$userid]);
      foreach($userId as $userids){
        if ($userids->type === 1){
      DB::table('users')
            ->where('id', $userid)
            ->update(['type' => 0]);
      return view('comic.change', compact('$userId'));
    }
    else{
      DB::table('users')
            ->where('id', $userid)
            ->update(['type' => 1]);
      return view('comic.change', compact('$userId'));
    }
}
    return view('comic.change', compact('$userId'));
    }

    public function changed(){
      $userid = Auth::id();
      $favourites = DB::select('SELECT posts.comic, posts.id, posts.title FROM posts INNER JOIN favourites ON favourites.postid = posts.id');
      $userId = DB::select('SELECT * FROM users WHERE id = ?', [$userid]);
      return view('comic.change', compact('$userId', 'favourites'));
    }
}
