<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;
    protected $table = 'program';
    protected $dates = ['deleted_at'];
    protected $fillable = ['nama_program','logo','desc','view','id_bagian','created_at','updated_at'];
    
    public function bagian()
    {
      return $this->belongsTo('App\Models\Bagian', 'id_bagian');
    }
}
