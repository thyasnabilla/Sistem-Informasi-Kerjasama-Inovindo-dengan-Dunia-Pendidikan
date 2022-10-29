<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    //

    protected $guarded = ['id'];
    public function kerjasama(){
        return $this->hasMany(Kerjasama::class,'institusi_id','id');
    }
    public function institusi_pimpinan(){
        return $this->hasOne(Institusi_pimpinan::class,'institusi_id','id');
    }
}
