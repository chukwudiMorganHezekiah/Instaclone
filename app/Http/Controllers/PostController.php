<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home.addnewpost');
    }

    public function all(){
        $post=new Post;
        $all=$post::all();
        return view('home.test',compact('all'));
    }

    public function selectuserposts($post){

        $query = Post::where('user_id',$post)->orderBy('created_at',"DESC")->paginate(10);
        return response()->json($query,200);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request,[
            'postname'=>'required|min:2',
            'postdescription'=>'required|min:2',
            'postimage'=>'required|image',
        ]);


        if($request->hasFile('postimage')){

            //filename with ext
            $filename=$request->file('postimage')->getClientOriginalName();

            //filename without the extension

            $filenamewithoutext= pathinfo($filename,PATHINFO_FILENAME);

            //fileextension

            $fileextension=$request->file('postimage')->getClientOriginalExtension();

            //filenametostore

            $filenametostore=$filename.'.' .time().'.'.$fileextension;

            //storing the file

           $path= $request->file('postimage')->storeAs('public/post_images',$filenametostore);

           if($path){

            $post=new Post;
            $post->postname=$request->input('postname');
            $post->postdescription=$request->input('postdescription');
            $post->user_id=auth()->user()->id;
            $post->postimage=$filenametostore;
            $post->save();
            return redirect('/dashboard');
           }

        }
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
