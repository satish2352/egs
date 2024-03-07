<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    use HasFactory; use HasFactory;
    protected $table = 'terms_conditions';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title','marathi_title','english_description','marathi_description'];

}