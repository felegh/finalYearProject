<?php
//Author Feleg B. Hagos
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class PageController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  //
    public function index(){
      return view('pages.index');
    }

    public function about(){
      $userid = Auth::id();
    $userId = DB::select('SELECT * FROM users WHERE	id = ?', [$userid]);
      return view('pages.about', compact('userId'));
    }

    public function artnavigbar()
    {

        $userid = Auth::id();
      $userId = DB::select('SELECT * FROM users WHERE	id = ?', [$userid]);
      return view('include.artnavigbar', compact('userId'));
    }

    public function readnavigbar()
    {

        $userid = Auth::id();
      $userId = DB::select('SELECT * FROM users WHERE	id = ?', [$userid]);
      return view('include.readnavigbar', compact('userId'));
    }

    public function library(){
      $userid = Auth::id();
      //$comic = DB::table('users')->select('users.firstname','posts.comic', 'posts.title', 'posts.summary')->join('posts','posts.userId','=','users.id')->where(['users.id' => '$userid'])->get();
      $userid = Auth::id();
      $userId = DB::select('SELECT * FROM users WHERE	id = ?', [$userid]);
      $comic = DB::select('SELECT * FROM posts WHERE userId = ?', [$userid]);
      return view('comic.library', compact('comic', 'userId'));
    }
    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
      $userid = Auth::id();
      $userId = DB::select('SELECT * FROM users WHERE id = ?', [$userid]);
      $search = $request->input('search');
      $artist = DB::select('SELECT posts.summary, posts.comic, posts.id, posts.title, users.firstname,
      users.lastname FROM posts
      INNER JOIN users ON posts.userid = users.id WHERE users.firstname = :firstname OR users.lastname = :lastname',
      ['firstname'=>$search, 'lastname'=>$search]);

      $comic = DB::table('posts')
      ->where('title', 'like', '%' . $search . '%')
      ->get();
      return view('comic.searched', compact('artist', 'comic', 'userId'));

    }
    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profile(){

      $userid = Auth::id();
      $favourites = DB::select('SELECT posts.comic, posts.id, posts.title FROM posts INNER JOIN favourites ON favourites.postid = posts.id');
      $userId = DB::select('SELECT * FROM users WHERE id = ?', [$userid]);
      $postid = DB::select('SELECT * FROM favourites WHERE userid = ?', [$userid]);
      return view('comic.profile', compact('userId', 'favourites'));
    }

    public function trending(){
    $trending = DB::select('SELECT posts.comic, posts.id, posts.title, reviews.rating FROM posts INNER JOIN reviews ON reviews.postid = posts.id WHERE reviews.rating >= 4');
    $userid = Auth::id();
    $userId = DB::select('SELECT * FROM users WHERE id = ?', [$userid]);
    return view('comic.trending', compact('trending', 'userId'));
    }
}
