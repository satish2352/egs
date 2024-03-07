<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainSubMenus extends Model
{
    use HasFactory;
    protected $table = 'main_sub_menuses';
    protected $primaryKey = 'id';
    protected $fillable = ['main_menu_id', 'menu_name_marathi', 'menu_name_english ', 'order_no'];
    // protected $table='main_sub_menuses';
    // protected $primeryKey='id';
    // public $timestamps=false;
    // protected $fillable=[];
}
