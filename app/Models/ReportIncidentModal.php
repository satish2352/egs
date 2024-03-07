<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportIncidentModal extends Model
{
    use HasFactory;
    protected $table = 'report_incident_modals';
    protected $primaryKey = 'id';
    protected $fillable = ['incident', 'location', 'datetime', 'mobile_number', 'media_upload','description'];

}