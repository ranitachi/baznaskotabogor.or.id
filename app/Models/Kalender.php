<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kalender extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'kalender';
    protected $fillable = ['title','start_date','end_date','desc','flag','created_at','updated_at'];
}
