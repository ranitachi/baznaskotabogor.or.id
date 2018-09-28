<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama_jabatan','id_bagian','created_at','updated_at'];
    public function staff()
    {
      return $this->hasMany('App\Models\Staff');
    }

    public function divisi()
    {
      return $this->belongsTo('App\Models\Bagian', 'id_bagian');
    }
}
