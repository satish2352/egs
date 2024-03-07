<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	DisasterForcast
};

class DisasterForcastRepository  {
	public function getAll()
    {
        try {
            return DisasterForcast::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {

       
        $disasterforcast_data = new DisasterForcast();
        $disasterforcast_data->english_title = $request['english_title'];
        $disasterforcast_data->marathi_title = $request['marathi_title'];
        $disasterforcast_data->english_description = $request['english_description'];
        $disasterforcast_data->marathi_description = $request['marathi_description'];
      
        $disasterforcast_data->save();       
              
		return $disasterforcast_data;

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
        $disasterforcast = DisasterForcast::find($id);
        if ($disasterforcast) {
            return $disasterforcast;
        } else {
            return null;
        }
    } catch (\Exception $e) {
		return [
            'msg' => 'Failed to get by id Disaster Forecast. '.$e,
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $disasterforcast_data = DisasterForcast::find($request->id);
        
        if (!$disasterforcast_data) {
            return [
                'msg' => 'Disaster Forecast not found.',
                'status' => 'error'
            ];
        }
        
      
        
        $disasterforcast_data->english_title = $request['english_title'];
        $disasterforcast_data->marathi_title = $request['marathi_title'];
        $disasterforcast_data->english_description = $request['english_description'];
        $disasterforcast_data->marathi_description = $request['marathi_description'];
      
        $disasterforcast_data->save();        
     
        return [
            'msg' => 'Disaster Forecast updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Disaster Forecast. '.$e,
            'status' => 'error'
        ];
    }
}

// public function deleteById($id)
// {
//     try {
//         $DisasterForcast = DisasterForcast::where(['id' => $request->delete_id])
//         ->update(['is_deleted' => false]);       
//     } catch (\Exception $e) {
//         return $e;
//     }
// }


public function deleteById($id)
{
    try {
    //     $disasterForecast = DisasterForcast::where(['id' => $request->$delete_id])
    //  ->update(['is_deleted' => true]);  

        $disasterForecast = DisasterForcast::find($id);

        if ($disasterForecast) {
            $disasterForecast->delete();
        } else {
            throw new \Exception('Disaster forecast not found.');
        }
        
        return 'Disaster forecast deleted successfully.';
    } catch (\Exception $e) {
        return $e->getMessage();
    }
}

       
}