<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marquee extends Model
{
    use HasFactory;
    protected $table = 'marquees';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title','marathi_title', 'url'];
}