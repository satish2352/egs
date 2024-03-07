<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportIncidentCrowdsourcing extends Model
{
    use HasFactory;
    protected $table = 'report_incident_crowdsourcings';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title', 'marathi_title','english_description','marathi_description','english_image','marathi_image'];
}