<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ComicPage;
use DB;
use Auth;
class PageTemplateController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
protected $timestamps = true;
  /**
   * Create a new controller instance.
  * @return \Illuminate\Http\Response
  * @param  \Illuminate\Http\Request  $request
  */
  public function page(){
    $userid = Auth::id();
  $userId = DB::select('SELECT * FROM users WHERE	id = ?', [$userid]);
    return view('comic.pageTemp', compact('postid', 'userId'));

  }
  /**
   * Create a new controller instance.
  * @return \Illuminate\Http\Response
  * @param  \Illuminate\Http\Request  $request
  */

    public function uploadPage(Request $request){
      $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,gif|max:2048',]);
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('image'), $imageName);

        $pageNo = $request->input('pageNo');
        $postid = $request->input('postId');
        $data = array('pageNo' => $pageNo, "postid"=>$postid, "imagepath"=>$imageName);
        DB::table('comic_pages')->insert($data);
        $userid = Auth::id();
      $userId = DB::select('SELECT * FROM users WHERE	id = ?', [$userid]);
        return view('comic.pageTemp', compact('postid', 'userId'));

    }


}
