<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JemputZakat extends Model
{
    use SoftDeletes;
    protected $table='jemputzakat';
    protected $fillable=['nama','telp','email','alamat','desc','jumlah','validasi','created_at','updated_at','deleted_at'];
}
