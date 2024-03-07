<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovtHospitals extends Model
{

    use HasFactory;
    protected $table = 'govt_hospitals';
    protected $primaryKey = 'id';
    protected $fillable = ['hospital_english_type', 'english_name','marathi_name', 'english_area','marathi_area', 'marathi_phone', 'english_phone', 'marathi_pincode', 'english_pincode' ];
}