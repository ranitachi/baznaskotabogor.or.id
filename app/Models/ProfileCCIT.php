<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfileCCIT extends Model
{
    //
    use SoftDeletes;
    protected $table = 'profile_baznas';
    protected $dates = ['deleted_at'];
    protected $fillable = ['title','desc','category','flag','view','created_at','updated_at'];
}
