<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listeler extends Model
{
    use HasFactory;
    protected $table = 'listeler';
    protected $fillable = ['panoid','sahipid','baslik'];
}
