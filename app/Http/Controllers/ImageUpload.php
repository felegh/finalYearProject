<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use DB;
use Auth;
use View;

class ImageUpload extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
     /**
      * Create a new controller instance.
     * @return \Illuminate\Http\Response
     * @param  \Illuminate\Http\Request  $request
     */
     //The following function allows users to upload their cover page
    public function uploadImage(Request $request)
    {

      $this->validate($request, [
        'image' => 'required|image|mimes:jpeg,png,gif|max:2048',]);
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('image'), $imageName);
        $title = $request->input('title');
        $summary = $request->input('summary');
        $userid = Auth::id();
        $data = array('title' => $title, "summary"=>$summary,"userId"=>$userid, "comic"=>$imageName);
      $postid = DB::table('posts')->insertGetId($data);
        $userId = DB::select('SELECT * FROM users WHERE	id = ?', [$userid]);
      return view('comic.pageTemp', compact('postid', 'userId'));
}

}
