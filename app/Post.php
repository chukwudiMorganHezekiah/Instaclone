<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    //fillables

    protected $fillable=['postname','postdescription','user_id','postimage'];
}
