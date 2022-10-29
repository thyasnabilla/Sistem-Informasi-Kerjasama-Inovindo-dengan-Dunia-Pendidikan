<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_mou extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function jenis(){
        return $this->belongsTo(Jenis::class,'daftar','id');
    }
    public function kerjasama(){
        return $this->hasOne(Kerjasama::class,'daftar_mou_id','id');
    }
    public function mou(){
        return $this->belongsTo(Mou::class,'mou_id','id');
    }
}
