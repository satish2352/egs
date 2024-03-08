<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ConstitutionHistory;
use App\Http\Services\Admin\Menu\MainMenuServices;
use Validator;
use Illuminate\Validation\Rule;
class MainMenuController extends Controller
{

   public function __construct()
    {
        $this->service = new MainMenuServices();
    }
    public function index()
    {
        try {
            $main_menu = $this->service->getAll();
            return view('admin.pages.menu.mainmenu.list-main-menu', compact('main_menu'));
            
        } catch (\Exception $e) {
            return $e;  
        }
    }
    public function add()
    {
        return view('admin.pages.menu.mainmenu.add-main-menu');
    }

    public function store(Request $request) {

        $id = $request->input('id'); // Assuming the 'id' value is present in the request

        $rules = [
            'menu_name_english' => 'required|unique:main_menuses|regex:/^[a-zA-Z\s]+$/u|max:255',
            'menu_name_marathi' => 'required|unique:main_menuses|max:255',           
        ];

    $messages = [   
        'menu_name_english.required'       =>  'Please Enter Menu.',
        'menu_name_english.regex' => 'Please Enter Text Only.',
        'menu_name_english.unique' => 'Menu Already Exist.',
        'menu_name_marathi.unique' => 'मेनू आधीपासून अस्तित्वात आहे.',
        'menu_name_english.max'   => 'Please Enter text length upto 255 character only.',
        'menu_name_marathi.required'       =>  'कृपया मेनू प्रविष्ट करा.',
        'menu_name_marathi.required'       =>'कृपया शीर्षक प्रविष्ट करा.',
        'menu_name_marathi.unique'  =>  'तुमचा घटना शीर्षक आधीपासून अस्तित्वात आहे .',
        'menu_name_marathi.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-main-menu')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_constitutionhistory = $this->service->addAll($request);
            if($add_constitutionhistory)
            {

                $msg = $add_constitutionhistory['msg'];
                $status = $add_constitutionhistory['status'];
                if($status=='success') {
                    return redirect('list-main-menu')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-main-menu')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-main-menu')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $menu_data = $this->service->getById($request->show_id);
            return view('admin.pages.menu.mainmenu.show-main-menu', compact('menu_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        try {
                $edit_data_id = base64_decode($request->edit_id);
                $main_menu_data =  $this->service->getById($edit_data_id);
                return view('admin.pages.menu.mainmenu.edit-main-menu', compact('main_menu_data', 'edit_data_id'));
        } catch (Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }

    }
    public function update(Request $request) {
        $id = $request->edit_id; // Assuming the 'id' value is present in the request

        $rules = [
            'menu_name_english' => ['required', 'max:255','regex:/^[a-zA-Z\s]+$/u', Rule::unique('main_menuses', 'menu_name_english')->ignore($id, 'id')],
            'menu_name_marathi' => ['required', 'max:255', Rule::unique('main_menuses', 'menu_name_marathi')->ignore($id, 'id')],
        ];
        $messages = [   
        'menu_name_english.required'       =>  'Please Enter Menu.',
        'menu_name_english.regex' => 'Please Enter Text Only.',
        'menu_name_english.unique' => 'Menu Already Exist.',
        'menu_name_english.max'   => 'Please Enter text length upto 255 character only.',
        'menu_name_marathi.required'       =>  'कृपया मेनू प्रविष्ट करा.',
        'menu_name_marathi.unique' => 'मेनू आधीपासून अस्तित्वात आहे.',
        'menu_name_marathi.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
        ];
    
        try {
            $validator = $this->validate($request, $rules);
            $add_constitutionhistory = $this->service->updateAll($request);
            if($add_constitutionhistory) {

                $msg = $add_constitutionhistory['msg'];
                $status = $add_constitutionhistory['status'];
                if($status=='success') {
                    return redirect('list-main-menu')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-main-menu')->withInput()->with(compact('msg','status'));
                }
    
            }
        } catch (Exception $e) {
            return redirect('add-main-menu')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    public function destroy(Request $request){
        try {
            $delete_main_menu = $this->service->deleteById($request->delete_id);
            if ($delete_main_menu) {
                $msg = $delete_main_menu['msg'];
                $status = $delete_main_menu['status'];
                if ($status == 'success') {
                    return redirect('list-main-menu')->with(compact('msg', 'status'));
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