<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormPendaftaran extends Model
{
    use SoftDeletes;
    protected $table = 'form_pendaftaran';
    protected $dates=['deleted_at'];
    protected $fillable = ['nama','email','telp','alamat','nomor_pendaftaran','created_at','updated_at'];
    
}
