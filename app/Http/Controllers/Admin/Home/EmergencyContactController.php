<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmergencyContact;
use App\Http\Services\Admin\Home\EmergencyContactServices;
use Validator;
class EmergencyContactController extends Controller
{

   public function __construct()
    {
        $this->service = new EmergencyContactServices();
    }
    public function index()
    {
        try {
            $emergency_contact = $this->service->getAll();
            return view('admin.pages.home.emergency_contact.list-contact', compact('emergency_contact'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.emergency_contact.add-contact');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => [
                'required',
                'regex:/^[a-zA-Z][a-zA-Z\s\-0-9]*$/',
                'max:255'
               ],            'marathi_title' => 'required|max:255',
            'english_name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_name' => 'required|max:255',
            'english_address' => ['required','regex:/^(?![0-9\s]+$)[A-Za-z0-9\s\.,#\-\(\)\[\]\{\}]+$/','max:255'],
            'marathi_address' => 'required|max:255',
            'email' => 'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'english_number' => 'required',
            'marathi_number' => 'required',
            'english_landline_no' => [
                'required',
                // 'regex:/^[+]?[0-9-()\/\s]{7,25}$/',
            ],
            'marathi_landline_no' => 'required|max:25',
            
         ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_name.required'=>'Please enter name.',
        'english_name.regex' => 'Please  enter text only.',
        'english_name.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_name.required'=>'कृपया नाव प्रविष्ट करा.',
        'marathi_name.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत नावची लांबी प्रविष्ट करा.',     
        'english_address.required' => 'Please enter address.',
        'english_address.regex' => 'Please enter right address.',
        'english_address.max'   => 'Please  enter address length upto 255 character only.',
        'marathi_address.required' => 'कृपया पत्ता प्रविष्ट करा.',
        'marathi_address.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',   
        'email.required' => 'Please enter email.',
        'email.regex' => 'Enter valid email.',
        'english_number.required' => 'Please enter number.',
         'marathi_number.required' => 'कृपया क्रमांक प्रविष्ट करा ',
        //  'english_number.regex' => 'Please enter only numbers with 10-digit.',
        // 'marathi_number.max' => 'कृपया फक्त 10-अंकी संख्या असलेली संख्या प्रविष्ट करा. ',

        'english_landline_no.required' =>'Please enter landline number.',
         'marathi_landline_no.required' => 'कृपया लँडलाइन नंबर प्रविष्ट करा.',
        //  'english_landline_no.regex' => 'Please enter valid landline number.',
        // 'marathi_landline_no.max' => 'कृपया लँडलाइन बरोबर  प्रविष्ट करा. ',
       
           
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-emergency-contact')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_emergency_contact = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_emergency_contact)
            {

                $msg = $add_emergency_contact['msg'];
                $status = $add_emergency_contact['status'];
                if($status=='success') {
                    return redirect('list-emergency-contact')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-emergency-contact')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-emergency-contact')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $emergency_contact = $this->service->getById($edit_data_id);
        return view('admin.pages.home.emergency_contact.edit-contact', compact('emergency_contact'));
    }
    public function update(Request $request)
{
    $rules = [

        'english_title' => [
            'required',
            'regex:/^[a-zA-Z][a-zA-Z\s\-0-9]*$/',
            'max:255'
           ],
            'marathi_title' => 'required|max:255',
            'english_name' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_name' => 'required|max:255',
            'english_address' => ['required','regex:/^(?![0-9\s]+$)[A-Za-z0-9\s\.,#\-\(\)\[\]\{\}]+$/','max:255'],
            'marathi_address' => 'required|max:255',
            'email' => 'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'english_number' => 'required',
            'marathi_number' => 'required',
            'english_landline_no' => [
                'required',
            ],
            'marathi_landline_no' => 'required',
            
           
     ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_name.required'=>'Please enter name.',
        'english_name.regex' => 'Please  enter text only.',
        'english_name.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_name.required'=>'कृपया नाव प्रविष्ट करा.',
        'marathi_name.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत नावची लांबी प्रविष्ट करा.',     
        'english_address.required' => 'Please enter address.',
        'english_address.regex' => 'Please enter right address.',
        'english_address.max'   => 'Please  enter address length upto 255 character only.',
        'marathi_address.required' => 'कृपया पत्ता प्रविष्ट करा.',
        'marathi_address.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',    
        'email.required' => 'Please enter email.',
        'email.regex' => 'Enter valid email.',
        'english_number.required' => 'Please enter number.',
         'marathi_number.required' => 'कृपया क्रमांक प्रविष्ट करा ',
        //  'english_number.regex' => 'Please enter only numbers with 10-digit.',
        'marathi_number.max' => 'कृपया फक्त 10-अंकी संख्या असलेली संख्या प्रविष्ट करा. ',

        'english_landline_no.required' =>'Please enter landline number.',
         'marathi_landline_no.required' => 'कृपया लँडलाइन नंबर प्रविष्ट करा.',
        //  'english_landline_no.regex' => 'Please enter valid landline number.',
        // 'marathi_landline_no.max' => 'कृपया लँडलाइन बरोबर  प्रविष्ट करा. ',
       
        
    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_contact = $this->service->updateAll($request);
            if ($update_contact) {
                $msg = $update_contact['msg'];
                $status = $update_contact['status'];
                if ($status == 'success') {
                    return redirect('list-emergency-contact')->with(compact('msg', 'status'));
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
            $emergency_contacts = $this->service->getById($request->show_id);
            return view('admin.pages.home.emergency_contact.show-contact', compact('emergency_contacts'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function updateOne(Request $request)
    {
        try {
            $active_id = $request->active_id;
        $result = $this->service->updateOne($active_id);
            return redirect('list-emergency-contact')->with('flash_message', 'Updated!');  
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $contact = $this->service->deleteById($request->delete_id);
            if ($contact) {
                $msg = $contact['msg'];
                $status = $contact['status'];
                if ($status == 'success') {
                    return redirect('list-emergency-contact')->with(compact('msg', 'status'));
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