<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebsiteContact;
use App\Http\Services\Admin\Home\WebsiteContactServices;
use Validator;
class WebsiteContactController extends Controller
{

   public function __construct()
    {
        $this->service = new WebsiteContactServices();
    }
    public function index()
    {
        try {
            $website_contact = $this->service->getAll();
            return view('admin.pages.home.website_contact.list-contact', compact('website_contact'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.website_contact.add-contact');
    }

    public function store(Request $request) {
        $rules = [
            'english_address' => 'required|max:255',
            'marathi_address' => 'required|max:255',  
            'email' => 'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z])+\.)+([a-zA-Z0-9]{2,4})+$/',
            'english_number' => [
                'required',
                // 'regex:/^[+]?[0-9-()\/\s]{7,25}$/',
            ],
            'marathi_number' => 'required|max:25',
            // 'marathi_icon' => 'required',
            
         ];
    $messages = [  
            'english_address.required' => 'Please enter address.',
            'english_address.max'   => 'Please  enter address length upto 255 character only.',
            'marathi_address.required' => 'कृपया पत्ता प्रविष्ट करा.',
            'marathi_address.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',        
            'email.required' => 'Please enter email.',
            'email.regex' => 'Enter valid email.',
            'english_number.required' => 'Please enter number.',
            'marathi_number.required' => 'कृपया क्रमांक प्रविष्ट करा ',
            // 'english_number.regex' => 'Please enter valid number.',
            'marathi_number.max' => 'कृपया क्रमांक बरोबर  प्रविष्ट करा. ',
 
    ];  

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-website-contact')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_general_contact = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_general_contact)
            {

                $msg = $add_general_contact['msg'];
                $status = $add_general_contact['status'];
                if($status=='success') {
                    return redirect('list-website-contact')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-website-contact')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-website-contact')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $website_contact = $this->service->getById($edit_data_id);
        return view('admin.pages.home.website_contact.edit-contact', compact('website_contact'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_address' => 'required|max:255',
        'marathi_address' => 'required|max:255',
        'email' => 'required|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z])+\.)+([a-zA-Z0-9]{2,4})+$/',
        'english_number' => [
            'required',
            // 'numeric',
            // 'regex:/^[+]?[0-9-()\/\s]{7,25}$/',
        ],
        'marathi_number' => 'required|max:25',
     ];
    $messages = [   
        'english_address.required' => 'Please enter address.',
        'english_address.max'   => 'Please  enter address length upto 255 character only.',
        'marathi_address.required' => 'कृपया पत्ता प्रविष्ट करा.',
        'marathi_address.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',    
        'email.required' => 'required',
        'email.regex' => 'Enter valid email.',
        'english_number.required' => 'Please enter number.',
        'marathi_number.required' => 'कृपया क्रमांक प्रविष्ट करा ',
        // 'english_number.regex' => 'Please enter valid number.',
        'marathi_number.max' => 'कृपया क्रमांक बरोबर  प्रविष्ट करा. ',
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
                    return redirect('list-website-contact')->with(compact('msg', 'status'));
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
            $website_contact = $this->service->getById($request->show_id);
            return view('admin.pages.home.website_contact.show-contact', compact('website_contact'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    
public function updateOne(Request $request)
{
    try {
        $active_id = $request->active_id;
    $result = $this->service->updateOne($active_id);
        return redirect('list-website-contact')->with('flash_message', 'Updated!');  
    } catch (\Exception $e) {
        return $e;
    }
}


public function destroy(Request $request){
    try {
        $contact = $this->service->deleteById($request->delete_id);
        if ($contact) {
            $msg = $contact['msg'];
            $status = $contact['status'];
            if ($status == 'success') {
                return redirect('list-website-contact')->with(compact('msg', 'status'));
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