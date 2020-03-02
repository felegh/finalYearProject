<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;
use App\ComicPage;
use Auth;

class PostController extends Controller
{
public function __construct(){
  $this->middleware('auth');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //returns all the comic Posted database
        $comicPosted = Post::all();
        $userid = Auth::id();
        $userId = DB::select('SELECT * FROM users WHERE id = ?', [$userid]);
        return view('comic.index', compact('comicPosted', 'userId'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $userid = Auth::id();
      $userId = DB::select('SELECT * FROM users WHERE id = ?', [$userid]);
        return view('comic.create', compact('userId'));


      }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $comicId = Post::find($id);
        $request->session()->put('postid', $id);
        $comments = DB::select('SELECT users.firstname, users.lastname, comments.comments FROM comments
          INNER JOIN users ON comments.userid = users.id
          INNER JOIN posts ON comments.postid = posts.id where comments.postid = ?', [$id]);
        $pages = DB::select('SELECT * FROM comic_pages where postid = ? order by pageNo asc, created_at desc', [$id]);
        $userid = Auth::id();
        $userId = DB::select('SELECT * FROM users WHERE id = ?', [$userid]);
        return view('comic.read', compact('comicId', 'comments', 'pages', 'userId'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
