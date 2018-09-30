<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konsultasi extends Model
{
    use SoftDeletes;
    protected $table='konsultasi';
    protected $fillable=['nama','telp','email','alamat','pertanyaan','jawaban','validasi','created_at','updated_at','deleted_at'];
}
