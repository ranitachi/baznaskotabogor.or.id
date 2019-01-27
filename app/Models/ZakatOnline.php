<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZakatOnline extends Model
{
    use SoftDeletes;
    protected $table='zakat_online';
    protected $fillable=['id_donasi','nama_lengkap','email','hp','jenis_donasi','jlh_donasi','metode_payment','status_donasi','tanggal_donasi','tanggal_payment','reference','created_at','updated_at','deleted_at'];
}
