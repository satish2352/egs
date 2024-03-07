<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContactNumbers extends Model
{
    use HasFactory;
    protected $table = 'emergency_contact_numbers';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title','english_description','marathi_description','english_image','marathi_image'];

    // protected $fillable = ['english_title', 'marathi_title','english_description','marathi_description', 'english_emergency_contact_title','marathi_emergency_contact_title','english_emergency_contact_number','marathi_emergency_contact_number','english_image','marathi_image'];
}
