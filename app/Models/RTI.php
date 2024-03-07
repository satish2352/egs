<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RTI extends Model
{
    use HasFactory;
    protected $table = 'r_t_i_s';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title','url','english_pdf', 'marathi_pdf'];

}