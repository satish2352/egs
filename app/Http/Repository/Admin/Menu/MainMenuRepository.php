<?php
namespace App\Http\Repository\Admin\Menu;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use App\Models\ {
	MainMenus
};

class MainMenuRepository  {
	public function getAll()
    {
        try {
            return MainMenus::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request) {
    try {
        $main_menu_data = new MainMenus();
        // $main_menu_data->url = $request['url'];
        $main_menu_data->menu_name_marathi = $request['menu_name_marathi'];
        $main_menu_data->menu_name_english = $request['menu_name_english'];
        $main_menu_data->order_no = isset($request['order_no']) ? $request['order_no'] : 0 ;
        $main_menu_data->save();       
     
		return $main_menu_data;
    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
    try {
        $main_menu_data = MainMenus::find($id);
        if ($main_menu_data) {
            return $main_menu_data;
        } else {
            return null;
        }
    } catch (\Exception $e) {
		return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try { 
        $main_menu_data = MainMenus::find($request['edit_id']);
        // $main_menu_data->url = $request['url'];
        $main_menu_data->menu_name_marathi = $request['menu_name_marathi'];
        $main_menu_data->menu_name_english = $request['menu_name_english'];
        $main_menu_data->order_no =  isset($request['order_no']) ? $request['order_no'] : 0 ;
        $main_menu_data->save();       
     
        return [
            'msg' => 'Main Menu updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Main Menu.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $main_menu_data = MainMenus::destroy($id);
        if ($main_menu_data) {
            return $main_menu_data;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to delete Main Menu.',
            'status' => 'error'
        ];
    }
}

}