<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterManagementWebPortal
};
use Config;

class DisasterManagementWebPortalRepository  {
	public function getAll()
    {
        try {
            return DisasterManagementWebPortal::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $disaster_data = new DisasterManagementWebPortal();
        $disaster_data->english_name = $request['english_name'];
        $disaster_data->marathi_name = $request['marathi_name'];
        $disaster_data->english_title = $request['english_title'];
        $disaster_data->marathi_title = $request['marathi_title'];
        $disaster_data->english_description = $request['english_description'];
        $disaster_data->marathi_description = $request['marathi_description'];
        $disaster_data->english_designation = $request['english_designation'];
        $disaster_data->marathi_designation = $request['marathi_designation'];
        $disaster_data->save();  
        
        $last_insert_id = $disaster_data->id;

        $englishImageName = $last_insert_id .'_' . rand(100000, 999999) . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id .'_' . rand(100000, 999999) . '_marathi.' . $request->marathi_image->extension();
        
        $disaster_data_update = DisasterManagementWebPortal::find($last_insert_id); 
        $disaster_data_update->english_image = $englishImageName; 
        $disaster_data_update->marathi_image = $marathiImageName;
        $disaster_data_update->save();
        
        return $last_insert_id;
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
        $disaster_web_portal = DisasterManagementWebPortal::find($id);
        if ($disaster_web_portal) {
            return $disaster_web_portal;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
public function updateAll($request)
{
    try {
        $return_data = array();
        $disaster_data = DisasterManagementWebPortal::find($request->id);

        if (!$disaster_data) {
            return [
                'msg' => 'Disaster Management Web Portal not found.',
                'status' => 'error'
            ];
        }

        // Store the previous image names
        $previousEnglishImage = $disaster_data->english_image;
        $previousMarathiImage = $disaster_data->marathi_image;

        // Update the fields from the request
        $disaster_data->english_name = $request['english_name'];
        $disaster_data->marathi_name = $request['marathi_name'];
        $disaster_data->english_title = $request['english_title'];
        $disaster_data->marathi_title = $request['marathi_title'];
        $disaster_data->english_description = $request['english_description'];
        $disaster_data->marathi_description = $request['marathi_description'];
        $disaster_data->english_designation = $request['english_designation'];
        $disaster_data->marathi_designation = $request['marathi_designation'];

        $disaster_data->save();
        
        $last_insert_id = $disaster_data->id;
        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;

    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Report Incident Crowdsourcing.',
            'status' => 'error',
            'error' => $e->getMessage() // Return the error message for debugging purposes
        ];
    }
}

public function deleteById($id)
{
    try {
        $disaster_web_portal = DisasterManagementWebPortal::find($id);
        if ($disaster_web_portal) {
            $delete_path_for_english_file = Config::get('DocumentConstant.HOME_DISATER_MGT_WEB_PORTAL_DELETE') . $disaster_web_portal->english_image;
            if (file_exists_s3($delete_path_for_english_file)) {
                removeImage($delete_path_for_english_file);
            }
            $delete_path_for_marathi_file = Config::get('DocumentConstant.HOME_DISATER_MGT_WEB_PORTAL_DELETE') . $disaster_web_portal->marathi_image;
            if (file_exists_s3($delete_path_for_marathi_file)) {
                removeImage($delete_path_for_marathi_file);
            }
            
            $disaster_web_portal->delete();
            
            return $disaster_web_portal;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}