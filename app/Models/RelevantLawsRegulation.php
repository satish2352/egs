<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelevantLawsRegulation extends Model
{
    use HasFactory;
    protected $table = 'relevant_laws_regulations';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'policies_year','english_pdf', 'marathi_pdf'];
}