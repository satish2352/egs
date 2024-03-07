<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisasterManagementGuidelines extends Model
{
    use HasFactory;
    protected $table = 'disaster_management_guidelines';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title', 'policies_year','english_pdf', 'marathi_pdf'];
}