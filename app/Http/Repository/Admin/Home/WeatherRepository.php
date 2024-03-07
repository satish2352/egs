<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	Weather
};
class WeatherRepository  {
	public function getAll(){
        try {
            return Weather::all();
        } catch (\Exception $e) {
            return $e;
        }
    }
	public function addAll($request){
    try {

        $englishImage = time() . '_english.' . $request->english_image->extension();
        $marathiImage= time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/home/weather', $englishImage);
        $request->marathi_image->storeAs('public/images/home/weather', $marathiImage);

        $englishPdf = time() . '_english.' . $request->english_pdf->extension();
        $marathiPdf= time() . '_marathi.' . $request->marathi_pdf->extension();

        $request->english_pdf->storeAs('public/pdf/weather', $englishPdf);
        $request->english_pdf->storeAs('public/pdf/weather', $marathiPdf);
        
        $weather_data = new Weather();
        $weather_data->english_title = $request['english_title'];
        $weather_data->marathi_title = $request['marathi_title'];
        $weather_data->english_description = $request['english_description'];
        $weather_data->marathi_description = $request['marathi_description'];
        $weather_data->weather_date = $request['weather_date'];
        $weather_data->expired_date = $request['expired_date'];
        $weather_data->english_image = $englishImage;
        $weather_data->marathi_image = $marathiImage;
        $weather_data->english_pdf = $englishPdf;
        $weather_data->marathi_pdf = $marathiPdf;
        $weather_data->save();       
              
		return $weather_data;

    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id){
    try {
        $weather = Weather::find($id);
        if ($weather) {
            return $weather;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Weather.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request){
    try {
        $weather_data = Weather::find($request->id);
        
        if (!$weather_data) {
            return [
                'msg' => 'Weather not found.',
                'status' => 'error'
            ];
        }
        
        // Delete existing files
        Storage::delete([
            'public/images/home/weather/' . $weather_data->marathi_image,
            'public/images/home/weather/' . $weather_data->english_image
        ]);

        $englishImage = time() . '_english.' . $request->english_image->extension();
        $marathiImage = time() . '_marathi.' . $request->marathi_image->extension();
        
        $request->english_image->storeAs('public/images/home/weather', $englishImage);
        $request->marathi_image->storeAs('public/images/home/weather', $marathiImage);
        
        $weather_data->english_title = $request['english_title'];
        $weather_data->marathi_title = $request['marathi_title'];
        $weather_data->english_description = $request['english_description'];
        $weather_data->marathi_description = $request['marathi_description'];
        $weather_data->weather_date = $request['weather_date'];
        $weather_data->expired_date = $request['expired_date'];
        $weather_data->marathi_image = $englishImage;
        $weather_data->english_image = $marathiImage;
        $weather_data->save();        
     
        return [
            'msg' => 'Weather updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Weather.',
            'status' => 'error'
        ];
    }
}

public function deleteById($id){
    try {
        $weather = Weather::find($id);
        if ($weather) {
            // Delete the images from the storage folder
            Storage::delete([
                'public/images/home/weather/'.$weather->marathi_image,
                'public/images/home/weather/'.$weather->english_image,
                'public/pdf/weather/'.$weather->marathi_pdf,
                'public/pdf/weather/'.$weather->english_pdf
            ]);

            // Delete the record from the database
            $weather->delete();
            
            return $weather;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}


