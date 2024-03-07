<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterImportantLinks extends Model
{
    use HasFactory;
    protected $table = 'footer_important_links';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'url'];}