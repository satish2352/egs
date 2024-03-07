<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;
    protected $table = 'gallery_category';
    protected $primaryKey = 'id';
    protected $fillable = ['english_name', 'marathi_name'];
}
