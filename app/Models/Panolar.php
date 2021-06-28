<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panolar extends Model
{
    use HasFactory;
    protected $table = 'panolar';
    protected $fillable = ['sahip', 'baslik', 'aciklama'];
}
