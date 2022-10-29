<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institusi_pimpinan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function institusi(){
        return $this->belongsTo(Institusi::class,'institusi_id','id');
    }
}
