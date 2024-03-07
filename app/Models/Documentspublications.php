<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentspublications extends Model
{
    use HasFactory;
    protected $table = 'documentspublications';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title','english_pdf', 'marathi_pdf'];

}