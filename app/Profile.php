<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Profile extends Model
{
    //this is the fillables

    protected $guarded=[];

    //userrelationship

    public function user(){
        return $this->belongsTo(User::class);
    }
}
