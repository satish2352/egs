<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DisasterForcast;
use App\Http\Services\Admin\Home\DisasterForcastServices;
use Validator;
class DisasterForcastController extends Controller
{

   public function __construct()
    {
        $this->service = new DisasterForcastServices();
    }
    public function index()
    {
        try {
            $disasterforcast = $this->service->getAll();
            return view('admin.pages.home.disasterforcast.list-disasterforcast', compact('disasterforcast'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        return view('admin.pages.home.disasterforcast.add-disasterforcast');
    }

    public function store(Request $request) {
       
        $rules = [
            'english_title' => 'required|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required',
         ];
    $messages = [   
        'english_title.required'=>'Please Enter Title',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-disasterforcast')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_disasterforcast = $this->service->addAll($request);
            if($add_disasterforcast)
            {

                $msg = $add_disasterforcast['msg'];
                $status = $add_disasterforcast['status'];
                if($status=='success') {
                    return redirect('list-disasterforcast')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-disasterforcast')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-disasterforcast')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $disasterforcast = $this->service->getById($request->show_id);
            return view('admin.pages.home.disasterforcast.show-disasterforcast', compact('disasterforcast'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $disasterforcast =  $this->service->getById($edit_data_id);
        return view('admin.pages.home.disasterforcast.edit-disasterforcast', compact('disasterforcast'));
    }
    public function update(Request $request)
{
    $rules = [
        'english_title' => 'required|max:255',
        'marathi_title' => 'required|max:255',
        'english_description' => 'required',
        'marathi_description' => 'required',
        // 'forcast_date' => 'required',
        // 'expired_date' => 'required',
        // 'english_image' => 'required',
        // 'marathi_image' => 'required',
     
        
     ];
$messages = [   
    'english_title.required'=>'Please enter title.',
    'english_title.max'   => 'Please  enter text length upto 255 character only.',
    'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
    'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
    'english_description.required' => 'Please enter description.',
    'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
  
    // 'forcast_date' => 'required',
    // 'expired_date' => 'required',
    // 'english_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    // 'marathi_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    
];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_disasterforcast = $this->service->updateAll($request);
            if ($update_disasterforcast) {
                $msg = $update_disasterforcast['msg'];
                $status = $update_disasterforcast['status'];
                if ($status == 'success') {
                    return redirect('list-disasterforcast')->with(compact('msg', 'status'));
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
         $delete_disasterforcast = $this->service->deleteById($request->delete_id);
         if ($delete_disasterforcast) {
             $msg = $delete_disasterforcast['msg'];
             $status = $delete_disasterforcast['status'];
             if ($status == 'success') {
                 return redirect('list-disasterforcast')->with(compact('msg', 'status'));
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