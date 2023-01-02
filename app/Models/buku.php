<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class buku extends Model
{
    use HasFactory;
    protected $table = "buku";

    public function rak (){
        return $this->belongsTo(rak::class, "id_rak","id");
    }

    public function pinjaman (){
        return $this->belongsToMany( buku ::class, "buku");
    }
}