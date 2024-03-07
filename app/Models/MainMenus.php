<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMenus extends Model
{
    // use HasFactory;
    protected $table='main_menuses';
    protected $primeryKey='id';
    public $timestamps=false;
    protected $fillable=[];

}
