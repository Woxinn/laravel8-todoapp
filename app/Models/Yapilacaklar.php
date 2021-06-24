<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yapilacaklar extends Model
{
    use HasFactory;
    protected $table = "yapilacaklar";
    protected $fillable = ['sahipid','listeid','yapilacak','durum'];
}
