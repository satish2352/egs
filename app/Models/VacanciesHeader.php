<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacanciesHeader extends Model
{
    use HasFactory;
    protected $table = 'vacancies_headers';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title','url','english_pdf', 'marathi_pdf'];

}