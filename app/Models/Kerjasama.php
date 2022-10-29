<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerjasama extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function institusi(){
        return $this->belongsTo(Institusi::class,'institusi_id','id');
    }
    public function jenis(){
        return $this->belongsTo(Jenis::class,'jenis_id','id');
    }
    public function mou(){
        return $this->hasOne(Mou::class,'institusi_id','institusi_id');
    }
    public function dokumen(){
        return $this->hasMany(Dokumen::class,'kerjasama_id','id');
    }
    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class,'perusahaan_id','id');
    }
    public function daftar_mou(){
        return $this->belongsTo(Daftar_mou::class,'daftar_mou_id','id');
    }
    public function peserta(){
        return $this->hasMany(Peserta::class,'kerjasama_id','id');
    }
}
