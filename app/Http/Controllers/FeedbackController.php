<?php
//Author Feleg B. Hagos
namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use DB;

class FeedbackController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  /**
   * Create a new controller instance.
  * @return \Illuminate\Http\Response
  * @param  \Illuminate\Http\Request  $request
  */
  //The following function displays the comments posted by the readers
  public function show(Request $request){
    $postid = $request->input('postid');
    $comments = DB::select('SELECT users.firstname, users.lastname, comments.comments FROM comments
      INNER users ON comments.userid = users.id
      INNER JOIN comments.postid = posts.id where comments.postid = ?', [$postid]);
    return view('comic.read', compact('comments'));
  }
  /**
   * Create a new controller instance.
   *
  * @param  \Illuminate\Http\Request  $request
  */
  //The following function allows users to post their comments by inserting the comment into the database
 public function UploadComments(Request $request)
 {
   $comments = $request->input('comment');
   $postid = $request->input('postid');
   $userid = Auth::id();
   $data = array('comments' => $comments, "userid"=>$userid, "postid"=>$postid);
   DB::table('comments')->insert($data);

   return back();
 }
 /**
  * Create a new controller instance.
  *
 * @param  \Illuminate\Http\Request  $request
 */
 //The following function allows user to upload their review
 public function reviews(Request $request){
   $review = $request->input('review');
   $postid = $request->input('postid');
   $userid = Auth::id();
   $rating = $request->input('ratings');
   $data = array('postid' => $postid, "rating"=>$rating, "review"=>$review, "userid"=>$userid );
   DB::table('reviews')->insert($data);
   return back();

 }
 /**
  * Create a new controller instance.
 * @return \Illuminate\Http\Response
 * @param  \Illuminate\Http\Request  $request
 */

 //The following allows user to display the reviews
 public function showReview(Request $request){
   $userid = Auth::id();
   $userId = DB::select('SELECT *  FROM users WHERE id = ?', [$userid]);
   $postid = $request->session()->get('postid');
   $review = DB::select('SELECT users.firstname, users.lastname, reviews.review, reviews.postid, reviews.rating, posts.id, posts.comic FROM reviews
     INNER JOIN posts ON reviews.postid = posts.id
     INNER JOIN users ON users.id = reviews.userid
     where reviews.postid = ?', [$postid]);
   return view('comic.reviewPage', compact('review', 'postid','userId', 'user'));
 }
 /**
  * Create a new controller instance.
 * @return \Illuminate\Http\Response
 * @param  \Illuminate\Http\Request  $request
 */
 //This allows users to add comic book as their favourite
 public function favourites(Request $request){
   $userid = Auth::id();
   $postid = $request->input('postid');
   $data = array('userid'=>$userid, "postid"=>$postid);
   DB::table('favourites')->insert($data);

   return back();
 }

}
