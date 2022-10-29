<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function mou(){
        return $this->belongsTo(Mou::class,'mou_id','id');
    }
    public function kerjasama(){
        return $this->belongsTo(Kerjasama::class,'kerjasama_id','id');
    }
    public function institusi(){
        return $this->belongsTo(Institusi::class,'institusi_id','id');
    }
}
