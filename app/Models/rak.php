<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rak extends Model
{
    use HasFactory;
    protected $table = "rak";

    public function buku (){
        return $this->hasMany(buku::class, "id_rak","id");
    }
}