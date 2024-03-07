<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weather;
use App\Http\Services\Admin\Home\WeatherServices;
use Validator;
class WeatherController extends Controller
{

   public function __construct()
    {
        $this->service = new WeatherServices();
    }
    public function index()
    {
        try {
            $weather = $this->service->getAll();
            return view('admin.pages.home.weather.list-weather', compact('weather'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.weather.add-weather');
    }

    public function store(Request $request) {
       
        $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'weather_date' => 'required',
            'expired_date' => 'required',
            'english_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
         
            
         ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'weather_date' => 'required',
        'expired_date' => 'required',
        'english_image.required' => 'The image field is required.',
        'marathi_image.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-weather')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_weather = $this->service->addAll($request);
            // print_r($add_weather);
            // die();
            if($add_weather)
            {

                $msg = $add_weather['msg'];
                $status = $add_weather['status'];
                if($status=='success') {
                    return redirect('list-weather')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-weather')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-weather')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $weather = $this->service->getById($request->show_id);
            return view('admin.pages.home.weather.show-weather', compact('weather'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $weather =  $this->service->getById($request->edit_id);
        return view('admin.pages.home.weather.edit-weather', compact('weather'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
        'marathi_title' => 'required|max:255',
        'english_description' => 'required',
        'marathi_description' => 'required',
        'weather_date' => 'required',
        'expired_date' => 'required',
        'english_image' => 'required',
        'marathi_image' => 'required',
     
        
     ];
$messages = [   
    'english_title.required'=>'Please enter title.',
    'english_title.regex' => 'Please  enter text only.',
    'english_title.max'   => 'Please  enter text length upto 255 character only.',
    'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
    'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
    'english_description.required' => 'Please enter description.',
    'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
    'weather_date' => 'required',
    'expired_date' => 'required',
    'english_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    'marathi_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    
];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_weather = $this->service->updateAll($request);
            if ($update_weather) {
                $msg = $update_weather['msg'];
                $status = $update_weather['status'];
                if ($status == 'success') {
                    return redirect('list-weather')->with(compact('msg', 'status'));
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with(compact('msg', 'status'));
                }
            }
        }
    } catch (Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
 }
 public function destroy(Request $request){
    try {
        $delete_weather = $this->service->deleteById($request->delete_id);
        if ($delete_weather) {
            $msg = $delete_weather['msg'];
            $status = $delete_weather['status'];
            if ($status == 'success') {
                return redirect('list-weather')->with(compact('msg', 'status'));
            } else {
                return redirect()->back()
                    ->withInput()
                    ->with(compact('msg', 'status'));
            }
        }
    } catch (\Exception $e) {
        return $e;
    }
}  

}