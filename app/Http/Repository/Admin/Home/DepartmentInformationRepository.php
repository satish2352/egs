<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DepartmentInformation
};
use Config;

class DepartmentInformationRepository  {
	public function getAll()
    {
        try {
            return DepartmentInformation::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        $data =array();
        $department_data = new DepartmentInformation();
        $department_data->english_title = $request['english_title'];
        $department_data->marathi_title = $request['marathi_title'];
        $department_data->english_description = $request['english_description'];
        $department_data->marathi_description = $request['marathi_description'];
        $url = $request['url'];
        // Check if "http://" or "https://" is already present in the URL
        if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            $url = 'http://' . $url; // Add "http://" to the beginning of the URL
        }
        $department_data->url = $url;
        $department_data->save();  
        
        $last_insert_id = $department_data->id;

        $englishImageName  = $last_insert_id .'_' . rand(100000, 999999) . '_english.' . $request->english_image->extension();
        $englishImageName1 = $last_insert_id .'_' . rand(100000, 999999) . '_english1.' . $request->english_image_new->extension();
        $marathiImageName  = $last_insert_id .'_' . rand(100000, 999999) . '_marathi.' . $request->marathi_image->extension();
        $marathiImageName1 = $last_insert_id .'_' . rand(100000, 999999) . '_marathi1.' . $request->marathi_image_new->extension();
        
        $department_data_update = DepartmentInformation::find($last_insert_id); 
        $department_data_update->english_image = $englishImageName; 
        $department_data_update->english_image_new = $englishImageName1; 
        $department_data_update->marathi_image = $marathiImageName;
        $department_data_update->marathi_image_new = $marathiImageName1;
        $department_data_update->save();

        $data['englishImageName'] =$englishImageName;
        $data['marathiImageName'] =$marathiImageName;
        $data['englishImageName1'] =$englishImageName1;
        $data['marathiImageName1'] =$marathiImageName1;
        return $data;

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
        $department = DepartmentInformation::find($id);
        if ($department) {
            return $department;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Disaster.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $return_data = array();
        $department_data = DepartmentInformation::find($request->id);

        if (!$department_data) {
            return [
                'msg' => 'Disaster Management News not found.',
                'status' => 'error'
            ];
        }

        // Store the previous image names
        $previousEnglishImage = $department_data->english_image;
        $previousMarathiImage = $department_data->marathi_image;

        $previousEnglishImage1 = $department_data->english_image_new;
        $previousMarathiImage1 = $department_data->marathi_image_new;

        // Update the fields from the request
        $department_data->english_title = $request['english_title'];
        $department_data->marathi_title = $request['marathi_title'];
        $department_data->english_description = $request['english_description'];
        $department_data->marathi_description = $request['marathi_description'];
        $url = $request['url'];
        // Check if "http://" or "https://" is already present in the URL
        if (!str_starts_with($url, 'http://') && !str_starts_with($url, 'https://')) {
            $url = 'http://' . $url; // Add "http://" to the beginning of the URL
        }
        $department_data->url = $url;
        
        $department_data->save();

        $last_insert_id = $department_data->id;
        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['english_image_new'] = $previousEnglishImage1;
        $return_data['marathi_image'] = $previousMarathiImage;
        $return_data['marathi_image_new'] = $previousMarathiImage1;
        return  $return_data;

        return [
            'msg' => 'Disaster News updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Disaster News.',
            'status' => 'error',
            'error' => $e->getMessage() // Return the error message for debugging purposes
        ];
    }
}
public function updateOne($request)
{
    try {
        $department = DepartmentInformation::find($request); // Assuming $request directly contains the ID        
        if ($department) {
            $is_active = $department->is_active === 1 ? 0 : 1;
            $department->is_active = $is_active;
            $department->save();

            return [
                'msg' => 'Disaster updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Disaster not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update slide.',
            'status' => 'error'
        ];
    }
}
public function deleteById($id)
{
    try {
        $department = DepartmentInformation::find($id);
        if ($department) {
            $delete_path_for_english_file = Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $department->english_image;
            if (file_exists_s3($delete_path_for_english_file)) {
                removeImage($delete_path_for_english_file);
            }
            $delete_path_for_marathi_file = Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $department->marathi_image;
            if (file_exists_s3($delete_path_for_marathi_file)) {
                removeImage($delete_path_for_marathi_file);
            }

            $delete_path_for_english_file_new = Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $department->english_image_new;
            if (file_exists_s3($delete_path_for_english_file_new)) {
                removeImage($delete_path_for_english_file_new);
            }
            $delete_path_for_marathi_file_new = Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $department->marathi_image_new;
            if (file_exists_s3($delete_path_for_marathi_file_new)) {
                removeImage($delete_path_for_marathi_file_new);
            }
            
            $department->delete();
            
            return $department;
            
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}