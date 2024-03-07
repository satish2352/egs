<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweeterFeed extends Model
{
    protected $table = 'tweeter_feeds';
    protected $primaryKey = 'id';
    protected $fillable = ['url'];
   
}