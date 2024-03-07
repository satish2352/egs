<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StateDisasterManagementPlan extends Model
{
    use HasFactory;
    protected $table = 'state_disaster_management_plans';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title','policies_year','english_pdf', 'marathi_pdf'];
}