<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VolunteerCitizenSupport extends Model
{
    use HasFactory;
    protected $table = 'volunteer_citizen_supports';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title','english_description','marathi_description','english_image','marathi_image'];
}