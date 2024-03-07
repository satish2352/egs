<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DepartmentInformation;
use App\Http\Services\Admin\Home\DepartmentInformationServices;
use Illuminate\Validation\Rule;
use Validator;
use Config;
class DepartmentInformationController extends Controller
{

   public function __construct()
    {
        $this->service = new DepartmentInformationServices();
    }
    public function index(){
        try {
            $department_info = $this->service->getAll();
            return view('admin.pages.home.department-information.list-department-information', compact('department_info'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add(){
        return view('admin.pages.home.department-information.add-department-information');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE").'|dimensions:min_width=100,min_height=100,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE").'',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE").'|dimensions:min_width=100,min_height=100,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE").'',
            'english_image_new' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'|dimensions:min_width=1000,min_height=300,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MIN_SIZE").'',
            'marathi_image_new' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'|dimensions:min_width=1000,min_height=300,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MIN_SIZE").'',
            // 'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
           
            
         ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 100x100 and 400x400 pixels.',
        'marathi_image.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        'marathi_image.image' => 'कृपया छायाचित्र फाइल कायदेशीर असणे आवश्यक आहे.',
        'marathi_image.mimes' => 'कृपया छायाचित्र JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
        'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE").'KB .',
        'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'कृपया छायाचित्र 100x100 आणि 400x400 पिक्सेल दरम्यान असणे आवश्यक आहे.',
      
        'english_image_new.required' => 'The image is required.',
        'english_image_new.image' => 'The image must be a valid image file.',
        'english_image_new.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'english_image_new.max' => 'The image size must not exceed '.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'KB .',
        'english_image_new.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'KB .',
        'english_image_new.dimensions' => 'The image dimensions must be between 1000x300 and 2000x1000 pixels.',
        'marathi_image_new.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        'marathi_image_new.image' => 'कृपया छायाचित्र फाइल कायदेशीर असणे आवश्यक आहे.',
        'marathi_image_new.mimes' => 'कृपया छायाचित्र JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
        'marathi_image_new.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'KB .',
        'marathi_image_new.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'KB .',
        'marathi_image_new.dimensions' => 'कृपया छायाचित्र 1000x300 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
        // 'url.required'=>'Please enter url.',
        // 'url.regex'=>'Please enter valid url.',
        

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-department-information')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_department_info = $this->service->addAll($request);
            if($add_department_info)
            {

                $msg = $add_department_info['msg'];
                $status = $add_department_info['status'];
                if($status=='success') {
                    return redirect('list-department-information')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-department-information')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-department-information')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request){
        $edit_data_id = base64_decode($request->edit_id);
        $department_info = $this->service->getById($edit_data_id);
        return view('admin.pages.home.department-information.edit-department-information', compact('department_info'));
    }
    public function update(Request $request){
    $rules = [
        'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
        'marathi_title' => 'required|max:255',
        'english_description' => 'required',
        'marathi_description' => 'required',
        // 'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
    ];
     if($request->has('english_image')) {
        $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE").'|dimensions:min_width=100,min_height=100,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE");
    }
    if($request->has('marathi_image')) {
        $rules['marathi_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE").'|dimensions:min_width=100,min_height=100,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE");
    }

    if($request->has('english_image_new')) {
        $rules['english_image_new'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'|dimensions:min_width=1000,min_height=300,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MIN_SIZE");
    }
    if($request->has('marathi_image_new')) {
        $rules['marathi_image_new'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'|dimensions:min_width=1000,min_height=300,max_width=2000,max_height=1000|min:'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MIN_SIZE");
    }
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'url.required'=>'Please enter url.',
        'url.regex'=>'Please valid url.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 100x100 and 400x400 pixels.',
        'marathi_image.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        'marathi_image.image' => 'कृपया छायाचित्र फाइल कायदेशीर असणे आवश्यक आहे.',
        'marathi_image.mimes' => 'कृपया छायाचित्र JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
        'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MAX_SIZE").'KB .',
        'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'कृपया छायाचित्र 100x100 आणि 400x400 पिक्सेल दरम्यान असणे आवश्यक आहे.',
   
        'english_image_new.required' => 'The image is required.',
        'english_image_new.image' => 'The image must be a valid image file.',
        'english_image_new.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'english_image_new.max' => 'The image size must not exceed '.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'KB .',
        'english_image_new.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MIN_SIZE").'KB .',
        'english_image_new.dimensions' => 'The image dimensions must be between 1000x300 and 2000x1000 pixels.',
        'marathi_image_new.required' => 'कृपया छायाचित्र आवश्यक आहे.',
        'marathi_image_new.image' => 'कृपया छायाचित्र फाइल कायदेशीर असणे आवश्यक आहे.',
        'marathi_image_new.mimes' => 'कृपया छायाचित्र JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
        'marathi_image_new.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा.'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MAX_SIZE").'KB .',
        'marathi_image_new.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DEPARTMENT_INFORMATION_NEW_IMAGE_MIN_SIZE").'KB .',
        'marathi_image_new.dimensions' => 'कृपया छायाचित्र 1000x300 आणि 2000x1000 पिक्सेल दरम्यान असणे आवश्यक आहे.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_disaster_news = $this->service->updateAll($request);
            if ($update_disaster_news) {
                $msg = $update_disaster_news['msg'];
                $status = $update_disaster_news['status'];
                if ($status == 'success') {
                    return redirect('list-department-information')->with(compact('msg', 'status'));
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
public function show(Request $request){
        try {
            $department_info = $this->service->getById($request->show_id);
            return view('admin.pages.home.department-information.show-department-information', compact('department_info'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function updateOne(Request $request){
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-department-information')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function destroy(Request $request){
        try {
            $department_info = $this->service->deleteById($request->delete_id);
            if ($department_info) {
                $msg = $department_info['msg'];
                $status = $department_info['status'];
                if ($status == 'success') {
                    return redirect('list-department-information')->with(compact('msg', 'status'));
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