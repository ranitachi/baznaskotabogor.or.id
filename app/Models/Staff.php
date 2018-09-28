<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;
    protected $table = 'staff';
    protected $dates = ['deleted_at'];
    protected $fillable =['nama','photo','desc','facebook','twitter','linkedin','id_user','id_jabatan','created_at','updated_at'];
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function jabatan()
    {
      return $this->belongsTo('App\Models\Jabatan', 'id_jabatan');
    }
}
