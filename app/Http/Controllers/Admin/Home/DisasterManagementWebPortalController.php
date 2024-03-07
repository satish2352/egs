<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisasterManagementWebPortal;
use App\Http\Services\Admin\Home\DisasterManagementWebPortalServices;
use Validator;
use Config;
class DisasterManagementWebPortalController extends Controller
{

   public function __construct()
    {
        $this->service = new DisasterManagementWebPortalServices();
    }
    public function index()
    {
        try {
            $disaster_web_portal = $this->service->getAll();
            return view('admin.pages.home.disaster_webportal.list-disaster-web-portal', compact('disaster_web_portal'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.disaster_webportal.add-disaster-web-portal');
    }

    public function store(Request $request) {
        $rules = [
            'english_name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_name' => 'required|max:255',
            'english_title' => 'required|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_designation' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_designation' =>'required|max:255',
            'english_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'|dimensions:min_width=150,min_height=150,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'',
            'marathi_image' => 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'|dimensions:min_width=150,min_height=150,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'',
            
         ];
    $messages = [   
            'english_name.required'=>'Please enter name.',
            'english_name.regex' => 'Please  enter text only.',
            'english_name.max'   => 'Please  enter text length upto 255 character only.',
            'marathi_name.required'=>'कृपया नाव प्रविष्ट करा.',
            'marathi_name.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत नावची लांबी प्रविष्ट करा.',   
            'english_title.required'=>'Please enter title.',
            // 'english_title.regex' => 'Please  enter text only.',
            'english_title.max'   => 'Please  enter text length upto 255 character only.',
            'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
            'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
            'english_description.required' => 'Please enter the description.',
            'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
            'english_designation.required'=>'Please enter designation name.',
            'english_designation.regex' => 'Please  enter text only.',
            'english_designation.max'   => 'Please  enter text length upto 255 character only.',
            'marathi_designation.required'=>'कृपया पदनाम नाव प्रविष्ट करा.',
            'marathi_designation.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत पदनाम ची लांबी प्रविष्ट करा.',
            'english_image.required' => 'The image is required.',
            'english_image.image' => 'The image must be a valid image file.',
            'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
            'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'KB .',
            'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'KB .',
            'english_image.dimensions' => 'The image dimensions must be between 150x150 and 400x400 pixels.',
            'marathi_image.required' => 'कृपया छायाचित्र आवश्यक आहे.',
            'marathi_image.image' => 'कृपया छायाचित्र फाइल कायदेशीर असणे आवश्यक आहे.',
            'marathi_image.mimes' => 'कृपया छायाचित्र JPEG, PNG, JPG स्वरूपात असणे आवश्यक आहे.',
            'marathi_image.max' => 'कृपया प्रतिमेचा आकार जास्त नसावा. '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'KB .',
            'marathi_image.min' => 'कृपया प्रतिमेचा आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'KB .',
            'marathi_image.dimensions' => 'कृपया छायाचित्र 150x150  आणि 400x400  पिक्सेल दरम्यान असणे आवश्यक आहे.',
        
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-disaster-management-web-portal')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_disaster_web_portal = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_disaster_web_portal)
            {

                $msg = $add_disaster_web_portal['msg'];
                $status = $add_disaster_web_portal['status'];
                if($status=='success') {
                    return redirect('list-disaster-management-web-portal')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-disaster-management-web-portal')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-disaster-management-web-portal')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $disaster_web_portal = $this->service->getById($edit_data_id);
        return view('admin.pages.home.disaster_webportal.edit-disaster-web-portal', compact('disaster_web_portal'));
    }
    public function update(Request $request)
{
    $rules = [
            'english_name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_name' => 'required|max:255',
            'english_title' => 'required|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
            'english_designation' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_designation' => 'required|max:255',
        ];
        if($request->has('english_image')) {
            $rules['english_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'|dimensions:min_width=150,min_height=150,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'';
        }
        if($request->has('marathi_image')) {
            $rules['marathi_image'] = 'required|image|mimes:jpeg,png,jpg|max:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'|dimensions:min_width=150,min_height=150,max_width=400,max_height=400|min:'.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'';
        }
    $messages = [   
        'english_name.required'=>'Please enter name.',
        'english_name.regex' => 'Please  enter text only.',
        'english_name.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_name.required'=>'कृपया नाव प्रविष्ट करा.',
        'marathi_name.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत नावची लांबी प्रविष्ट करा.',     
        'english_title.required'=>'Please enter title.',
        // 'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_description.required' => 'Please enter the description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'english_designation.required'=>'Please enter designation name.',
        'english_designation.regex' => 'Please  enter text only.',
        'english_designation.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_designation.required'=>'कृपया पदनाम नाव प्रविष्ट करा.',
        'marathi_designation.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत पदनाम ची लांबी प्रविष्ट करा.',
        'english_image.required' => 'The image is required.',
        'english_image.image' => 'The image must be a valid image file.',
        'english_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'english_image.max' => 'The image size must not exceed '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'KB .',
        'english_image.dimensions' => 'The image dimensions must be between 150x150 and 400x400 pixels.',
        'marathi_image.required' => 'The image is required.',
        'marathi_image.image' => 'The image must be a valid image file.',
        'marathi_image.mimes' => 'The image must be in JPEG, PNG, JPG format.',
        'marathi_image.max' => 'The image size must not exceed  '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MAX_SIZE").'KB .',
        'english_image.min' => 'The image size must not be less than '.Config::get("AllFileValidation.DISASTER_WEB_PORTAL_IMAGE_MIN_SIZE").'KB .',
        'marathi_image.dimensions' => 'The image dimensions must be between 150x150 and 400x400 pixels.',
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_disaster_web_portal = $this->service->updateAll($request);
            if ($update_disaster_web_portal) {
                $msg = $update_disaster_web_portal['msg'];
                $status = $update_disaster_web_portal['status'];
                if ($status == 'success') {
                    return redirect('list-disaster-management-web-portal')->with(compact('msg', 'status'));
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
public function show(Request $request)
    {
        try {
            $disaster_web_portal = $this->service->getById($request->show_id);
            return view('admin.pages.home.disaster_webportal.show-disaster-web-portal', compact('disaster_web_portal'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request){
        try {
            $disaster_web_portal = $this->service->deleteById($request->delete_id);
            if ($disaster_web_portal) {
                $msg = $disaster_web_portal['msg'];
                $status = $disaster_web_portal['status'];
                if ($status == 'success') {
                    return redirect('list-disaster-management-web-portal')->with(compact('msg', 'status'));
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