<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicWebPages extends Model
{
    use HasFactory;
    protected $table = 'dynamic_web_pages';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_image', 'marathi_image', 'publish_date'];
}
