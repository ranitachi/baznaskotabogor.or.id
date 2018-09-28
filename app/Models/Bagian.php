<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Bagian extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'bagian';
    protected $fillable = ['nama_bagian','id_level', 'created_at', 'updated_at'];
    public function jabatan()
    {
      return $this->hasMany('App\Models\Jabatan');
    }

}
