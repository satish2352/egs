<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Admin\Menu\SubMenuServices;
use Validator;
use App\Models\MainMenus;

class SubMenuController extends Controller
{

   public function __construct()
    {
        $this->service = new SubMenuServices();
    }
    public function index()
    {
        try {
            $sub_menu = $this->service->getAll();
            return view('admin.pages.menu.submenu.list-sub-menu', compact('sub_menu'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function add()
    {
        $main_menu_data = MainMenus::all();
        return view('admin.pages.menu.submenu.add-sub-menu',  ['main_menu_data' => $main_menu_data]);
        // return view('admin.pages.menu.submenu.add-sub-menu');
    }

    public function store(Request $request) {
    $rules = [
        'menu_name_english' => 'required|max:255',
        'menu_name_marathi' => 'required|max:255',
        // 'order_no' => 'required',
        
        ];
    $messages = [   
        'menu_name_english.required'=>'Please enter menu name title.',
        // 'menu_name_english.regex' => 'Please  enter text only.',
        'menu_name_english.max'   => 'Please  enter menu name length upto 255 character only.',
        'menu_name_marathi.required'=>'कृपया मेनू नावाचे शीर्षक प्रविष्ट करा.',
        'menu_name_marathi.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
        // 'order_no.required' => 'Please enter marathi title.',
    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-sub-menu')
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
                    return redirect('list-sub-menu')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-sub-menu')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-sub-menu')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    public function show(Request $request)
    {
        try {
            $menu_data = $this->service->getById($request->show_id);
            return view('admin.pages.menu.submenu.show-sub-menu', compact('menu_data'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function edit(Request $request)
    {
        $edit_data_id = base64_decode($request->edit_id);
        $main_menu_data =  $this->service->getById($edit_data_id);
        return view('admin.pages.menu.submenu.edit-sub-menu', compact('main_menu_data', 'edit_data_id'));
    }
    public function update(Request $request) {
        $rules = [
            'menu_name_english' => 'required|max:255',
            'menu_name_marathi' => 'required|max:255',
            // 'order_no' => 'required',
            
            ];
        $messages = [   
            'menu_name_english.required'=>'Please enter menu name title.',
            // 'menu_name_english.regex' => 'Please  enter text only.',
            'menu_name_english.max'   => 'Please  enter menu name length upto 255 character only.',
            'menu_name_marathi.required'=>'कृपया मेनू नावाचे शीर्षक प्रविष्ट करा.',
            'menu_name_marathi.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',  
            // 'order_no.required' => 'Please enter marathi title.',
        ];


        try {
            $validation = Validator::make($request->all(), $rules, $messages);
            if ($validation->fails()) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $update_constitutionhistory = $this->service->updateAll($request);
                if ($update_constitutionhistory) {
                    $msg = $update_constitutionhistory['msg'];
                    $status = $update_constitutionhistory['status'];
                    if ($status == 'success') {
                        return redirect('list-sub-menu')->with(compact('msg', 'status'));
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
            $delete_sub_menu = $this->service->deleteById($request->delete_id);
            if ($delete_sub_menu) {
                $msg = $delete_sub_menu['msg'];
                $status = $delete_sub_menu['status'];
                if ($status == 'success') {
                    return redirect('list-sub-menu')->with(compact('msg', 'status'));
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