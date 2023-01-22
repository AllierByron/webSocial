<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    //inversa
    public function publication(){
        return $this->belongsTo(publication::class);
    } 
    public function user(){
        return $this->belongsTo(User::class);
    } 
}
