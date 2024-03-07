<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingContent extends Model
{
    use HasFactory;
    protected $table = 'landing_content';
    protected $primaryKey = 'id';
    protected $fillable = ['title','image','description'];
}