<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use App\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages=[
            'min'=>"This form should has a minimum of two characters"

        ];
        $validator=Validator::make($request->all(),
        [
            'stagename'=>'min:2',
            'link'=>'min:3'
        ],
    $messages);

    if($validator->fails()){
        $response=$validator->messages();
    }else{

//saving the data
        $profile = new Profile;
        $profile->profilelink=$request->link;
        $profile->stagename=$request->stagename;
        $profile->user_id=auth()->user()->id;
        $profile->save();
        $response="data saved";
    }

    return response()->json($response,200);

    }

    //saving the users image


    public function storeProfileImage(Request $request){


    $about=$request->about;

    $exploded= explode(',' ,$request->image);

    $decoded=base64_decode($exploded[1]);

    if(str_contains($exploded[0],'jpeg')){

       $extension='jpg';


    }else{
       $extension='png';

    }
    $filename=str_random().'.'.$extension;
    $path= './storage/profile_images/'.$filename;

    if(file_put_contents($path,$decoded)){

       $user=auth()->user()->id;

       $query=DB::update("UPDATE profiles SET profileimage ='$filename',abouuser='$about' WHERE user_id = '$user'");

       if($query){
           return response()->json('saved',200);

       }else{
           return response()->json('not saved to database',200);
       }


    }else{
        return response()->json('file no saved to folder',200);



   }







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {



        //

        $profile=Profile::all()->where('user_id',auth()->user()->id);

        return view('home.editprofile',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //validate

        $this->validate($request,[
            'username'=>'required|min:2',
            'stagename'=>'required|min:2',
            'aboutyou'=>'required|min:2',
            'profileimage'=>'image',
            'profilelink'=>'required|min:2'
        ]);


        if($request->hasFile('profileimage')){


            //filename with ext
            $filename=$request->file('profileimage')->getClientOriginalName();

            //filename without the extension

            $filenamewithoutext= pathinfo($filename,PATHINFO_FILENAME);

            //fileextension

            $fileextension=$request->file('profileimage')->getClientOriginalExtension();

            //filenametostore

            $filenametostore=$filename.'.' .time().'.'.$fileextension;

            //storing the file

           $path= $request->file('profileimage')->storeAs('public/profile_images',$filenametostore);

           if($path){


            $stagename=$request->input('stagename');
            $profilelink =$request->input('profilelink');
            $user_id=auth()->user()->id;
            $profileimage=$filenametostore;
            $abouuser=$request->input('aboutyou');



            $raw= DB::update("UPDATE profiles set profilelink ='$profilelink',stagename='$stagename',profileimage='$profileimage',abouuser='$abouuser' WHERE `user_id` = '$user_id'");


        if($raw){
          $user=User::find(auth()->user()->id);
         $user->username=$request->input('username');
           $user->save();
        return redirect('/dashboard');
            }

           }

        }else{


            $stagename=$request->input('stagename');
            $profilelink =$request->input('profilelink');
            $user_id=auth()->user()->id;
           // $profileimage=$filenametostore;
            $abouuser=$request->input('aboutyou');


            $raw= DB::update("UPDATE profiles set profilelink ='$profilelink',stagename='$stagename',abouuser='$abouuser' WHERE `user_id` = '$user_id'");



          $user=User::find(auth()->user()->id);
         $user->username=$request->input('username');
           $user->save();
        return redirect('/dashboard');
            

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function profileImage($id){

        $query=DB::select("SELECT profileimage from profiles where user_id ='$id' ");
        return response()->json($query,200);
    }

    public function selectotheruserdata($id){

        $query=DB::select("SELECT profilelink,stagename,abouuser from profiles where user_id ='$id' ");
        $querytwo=DB::select("SELECT username from users where id ='$id' ");
        $returning=array_merge($query,$querytwo);
        return response()->json($returning,200);

    }
}
