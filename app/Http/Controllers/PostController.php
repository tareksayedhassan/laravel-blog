<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
class PostController extends Controller
{
public function index()
{
    // select *from posts;
    $postsFromDB=post::all();

    return view("posts.index" , ['posts'=>$postsFromDB] );
}
public function show(post $post){
    // $singlePostFromdb=post::findOrFail($postId);

    return view('Posts.show' , ['post'=> $post]);
}
public function create(){
    $SelectUsers=User::all();
    return view("Posts.create" , ['Users'=>$SelectUsers]);
}
public function store(){

$title=request()->title;
$description=request()->description;
$postedby = request()->post_creator;

request()->validate([
    'title' => ['required' , 'unique:posts', 'min:3'],
    'description' => ['required'],
    'post_creator'=>['required' , 'exists:users,id']
]);
post::create([
    'title'=>$title,
    'description'=>$description,
    "user_id"=>$postedby,
]);

    return to_route("posts.index");
}
public function edit(post $post) {
    $SelectUsers=User::all();
    return view('posts.edit' , ['users'=>$SelectUsers , "post"=>$post]);
}
public function update($postid){

    $title=request()->title;
    $description=request()->description;
    $postedby = request()->post_creator;

$singlePostFromdb=post::find($postid);

request()->validate([
    'title' => ['required' , 'unique:posts', 'min:3'],
    'description' => ['required'],
    'post_creator'=>['required' , 'exists:users,id']
]);

$singlePostFromdb->update([
    'title'=>$title,
    "description"=>$description,
    "user_id"=>$postedby
]);

    return to_route("posts.show" , $postid);
}
public function destory($postid){
$post=post::find($postid);
$post->delete();
    return to_route('posts.index');
}
}

