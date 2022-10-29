<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    use HasFactory;
    protected $table = 'mous';
    protected $guarded = ['id'];

    public function institusi(){
        return $this->belongsTo(Institusi::class,'institusi_id','id');
    }
    public function jenis(){
        return $this->belongsTo(Jenis::class,'jenis_id','id');
    }
    public function daftar_mou(){
        return $this->hasMany(Daftar_mou::class,'mou_id','id');
    }
    public function dokumen(){
        return $this->hasOne(Dokumen::class,'mou_id','id');
    }
    public function kerjasama(){
        return $this->hasMany(Kerjasama::class,'institusi_id','id');
    }
    public function perusahaan(){
        return $this->belongsTo(Perusahaan::class,'perusahaan_id','id');
    }
    public function institusi_pimpinan(){
        return $this->belongsTo(Institusi_pimpinan::class,'institusi_pimpinan_id','id');
    }
}
