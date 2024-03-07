<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;
    protected $table = 'emergency_contacts';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title','marathi_title','english_name','marathi_name','english_address','marathi_address','email','english_number','marathi_number','english_landline_no','marathi_landline_no'];
}