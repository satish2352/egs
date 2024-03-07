<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metadata extends Model
{
    use HasFactory;
    protected $table = 'metadata';
    protected $primaryKey = 'id';
    protected $fillable = ['english_name', 'keywords'];
}