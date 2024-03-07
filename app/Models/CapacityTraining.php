<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapacityTraining extends Model
{
    use HasFactory;
    protected $table = 'capacity_trainings';
    protected $primaryKey = 'id';
    protected $fillable = ['english_title','marathi_title','english_description','marathi_description','english_image','marathi_image'];


}