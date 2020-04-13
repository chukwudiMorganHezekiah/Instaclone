<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class FollowController extends Controller
{
    //

    public function toggle($id){
        $user_id=$id;
        $follower=auth()->user()->id;



        $determine=DB::select("SELECT * FROM `followings` WHERE `user_id`='$user_id' AND follower_id ='$follower' ");
        if($determine){
            $unfollowings=DB::delete("DELETE FROM `followings` where `user_id` = '$user_id' AND follower_id = '$follower'");

            if($unfollowings){
                return 'Unfollowed';
            }

        }else{
            $followings=DB::insert("INSERT into `followings` (`user_id`, `follower_id`) values ('$user_id', '$follower')");
            if($followings){
                return "followed";
            }
        }

    }

    public function followings($id){
        if(auth()->user()->id == $id){

            $selecting=DB::select("SELECT `user_id` FROM `followings` WHERE  follower_id ='$id' ");
            if($selecting){
                return response()->json($selecting,200);
            }

        }

    }
}
