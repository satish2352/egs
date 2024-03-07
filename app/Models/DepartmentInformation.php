<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentInformation extends Model
{
    use HasFactory;
    protected $table = 'department_information';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'english_description', 'marathi_description','english_image','marathi_image','english_image_new','marathi_image_new', 'url'];
}