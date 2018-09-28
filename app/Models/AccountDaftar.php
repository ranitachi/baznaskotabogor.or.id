<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class AccountDaftar extends Model
{
    use SoftDeletes;
    protected $table = 'account_daftar';
    protected $dates = ['deleted_at'];
    public function form_pendaftaran()
    {
      return $this->belongsTo('App\Models\FormPendaftaran', 'id_daftar');
    }
}
