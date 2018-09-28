<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Beasiswa extends Model
{
    use SoftDeletes;
    protected $table = 'beasiswa';
    protected $dates=['deleted_at'];
    protected $fillable=['title','desc','periode','status','jml_penerima','created_at','updated_at'];
}
