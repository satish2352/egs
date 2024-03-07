<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterManagementNews
};
use Config;

class DisasterManagementNewsRepository  {
	public function getAll()
    {
        try {
            return DisasterManagementNews::all();
        } catch (\Exception $e) {
            return $e;
        }
    }
   
	public function addAll($request)
{
    try {
        $data =array();
        $disaster_data = new DisasterManagementNews();
        $disaster_data->english_title = $request['english_title'];
        $disaster_data->marathi_title = $request['marathi_title'];
        $disaster_data->english_description = $request['english_description'];
        $disaster_data->marathi_description = $request['marathi_description'];
        $disaster_data->english_url = $request['english_url'];
        $disaster_data->disaster_date = $request['disaster_date'];

        $disaster_data->save();       
        $last_insert_id = $disaster_data->id;

        $englishImageName = $last_insert_id .'_' . rand(100000, 999999) . '_english.' . $request->english_image->extension();
        $marathiImageName = $last_insert_id .'_' . rand(100000, 999999) . '_marathi.' . $request->marathi_image->extension();
        
        $disaster_news = DisasterManagementNews::find($last_insert_id); // Assuming $request directly contains the ID
        $disaster_news->english_image = $englishImageName; // Save the image filename to the database
        $disaster_news->marathi_image = $marathiImageName; // Save the image filename to the database
        $disaster_news->save();
        
        $data['englishImageName'] =$englishImageName;
        $data['marathiImageName'] =$marathiImageName;
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
        $disaster = DisasterManagementNews::find($id);
        if ($disaster) {
            return $disaster;
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
        $disaster_data = DisasterManagementNews::find($request->id);

        if (!$disaster_data) {
            return [
                'msg' => 'Disaster Management News not found.',
                'status' => 'error'
            ];
        }

        // Store the previous image names
        $previousEnglishImage = $disaster_data->english_image;
        $previousMarathiImage = $disaster_data->marathi_image;

        // Update the fields from the request
        $disaster_data->english_title = $request['english_title'];
        $disaster_data->marathi_title = $request['marathi_title'];
        $disaster_data->english_description = $request['english_description'];
        $disaster_data->marathi_description = $request['marathi_description'];
        $disaster_data->english_url = $request['english_url'];
        $disaster_data->disaster_date = $request['disaster_date'];

        $disaster_data->save();
        $last_insert_id = $disaster_data->id;

        $return_data['last_insert_id'] = $last_insert_id;
        $return_data['english_image'] = $previousEnglishImage;
        $return_data['marathi_image'] = $previousMarathiImage;
        return  $return_data;
      
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
        $marquee = DisasterManagementNews::find($request); // Assuming $request directly contains the ID        
        if ($marquee) {
            $is_active = $marquee->is_active === 1 ? 0 : 1;
            $marquee->is_active = $is_active;
            $marquee->save();

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
        $disaster = DisasterManagementNews::find($id);
        if ($disaster) {
            if (file_exists_s3(Config::get('DocumentConstant.DISASTER_NEWS_DELETE') . $disaster->english_image)) {
                removeImage(Config::get('DocumentConstant.DISASTER_NEWS_DELETE') . $disaster->english_image);
            }
            if (file_exists_s3(Config::get('DocumentConstant.DISASTER_NEWS_DELETE') . $disaster->marathi_image)) {
                removeImage(Config::get('DocumentConstant.DISASTER_NEWS_DELETE') . $disaster->marathi_image);
            }
            $disaster->delete();
            
            return $disaster;
            
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}