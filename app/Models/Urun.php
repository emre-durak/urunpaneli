<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    use HasFactory;

    protected $table = "urunler";
    public $timestamps = false;

    protected $fillable = [
        "name",
        "description",
    ];

}

?>