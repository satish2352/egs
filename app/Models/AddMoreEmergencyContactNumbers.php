<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddMoreEmergencyContactNumbers extends Model
{
    use HasFactory;
    protected $table = 'addmore_emergency_contact_numbers';
    protected $primaryKey = 'id';
    protected $fillable = ['emergency_contact_id','english_emergency_contact_title', 'marathi_emergency_contact_title','english_emergency_contact_number', 'marathi_emergency_contact_number'];
}
