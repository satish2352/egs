<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WheatherForecast extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'wheather_forecasts';
    protected $primaryKey = 'id';
}
