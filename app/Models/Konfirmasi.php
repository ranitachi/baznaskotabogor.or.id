<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konfirmasi extends Model
{
    use SoftDeletes;
    protected $table = 'konfirmasi';
    protected $dates = ['deleted_at'];
    protected $fillable = ['file','desc','validasi','tgl_transfer','id_bank','nama_pengirim','bank_asal','jumlah','created_at','updated_at'];

    function bank()
    {
        return $this->belongsTo('App\Models\Bank','id_bank');
    }

}
