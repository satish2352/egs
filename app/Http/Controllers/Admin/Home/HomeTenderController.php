<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeTender;
use App\Http\Services\Admin\Home\HomeTenderServices;
use Validator;
use Config;
use Illuminate\Validation\Rule;
class HomeTenderController extends Controller
{

   public function __construct()
    {
        $this->service = new HomeTenderServices();
    }
    public function index()
    {
        try {
            $tender = $this->service->getAll();
            return view('admin.pages.home.home_tender.list-tender', compact('tender'));
        } catch (\Exception $e) {
            return $e;
        }
    }
   
    public function add()
    {
        return view('admin.pages.home.home_tender.add-tender');
    }

    public function store(Request $request) {
        $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required', 
            'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'tender_date' => 'required',
            'english_pdf' => 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.HOME_TENDER_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.HOME_TENDER_PDF_MIN_SIZE").'',
            'marathi_pdf' => 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.HOME_TENDER_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.HOME_TENDER_PDF_MIN_SIZE").'',

         ];
    $messages = [   
        'english_title.required'=>'Please enter title.',
        'english_title.regex' => 'Please  enter text only.',
        'english_title.max'   => 'Please  enter text length upto 255 character only.',
        'marathi_title.required'=>'कृपया शीर्षक प्रविष्ट करा.',
        'marathi_title.max'   => 'कृपया केवळ २५५ वर्णांपर्यंत मजकूराची लांबी प्रविष्ट करा.',     
        'english_description.required' => 'Please enter description.',
        'marathi_description.required' => 'कृपया वर्णन प्रविष्ट करा.',
        'url.required'=>'Please enter url.',
        'url.regex'=>'Please enter valid url.',
        'tender_date' => 'Please enter date.',
        'english_pdf.required' => 'Please upload an PDF file.',
        'english_pdf.file' => 'The file must be of type: file.',
        'english_pdf.mimes' => 'The file must be a PDF.',
        'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
        'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
        'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
        'marathi_pdf.max' => 'कृपया पीडीएफ आकार जास्त नसावा. '.Config::get("AllFileValidation.HOME_TENDER_PDF_MAX_SIZE").'KB .',
        'marathi_pdf.min' => 'कृपया पीडीएफ आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.HOME_TENDER_PDF_MIN_SIZE").'KB .',
        'english_pdf.max' => 'The pdf size must not exceed '.Config::get("AllFileValidation.HOME_TENDER_PDF_MAX_SIZE").'KB .',
        'english_pdf.min' => 'The image size must not be less than '.Config::get("AllFileValidation.HOME_TENDER_PDF_MIN_SIZE").'KB .',

    ];

    try {
        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('add-home-tender')
                ->withInput()
                ->withErrors($validation);
        }
        else
        {
            $add_tender = $this->service->addAll($request);
            // print_r($add_tenders);
            // die();
            if($add_tender)
            {

                $msg = $add_tender['msg'];
                $status = $add_tender['status'];
                if($status=='success') {
                    return redirect('list-home-tender')->with(compact('msg','status'));
                }
                else {
                    return redirect('add-home-tender')->withInput()->with(compact('msg','status'));
                }
            }

        }
    } catch (Exception $e) {
        return redirect('add-home-tender')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    }
}
    
 
public function edit(Request $request)
{
    $edit_data_id = base64_decode($request->edit_id);
    $tender = $this->service->getById($edit_data_id);
    return view('admin.pages.home.home_tender.edit-tender', compact('tender'));
}
  
public function update(Request $request)
{
    $rules = [
            'english_title' => 'required|regex:/^[a-zA-Z\s]+$/u|max:255',
            'marathi_title' => 'required|max:255',
            'english_description' => 'required',
            'marathi_description' => 'required', 
            'url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
            'tender_date' => 'required',

         ];
         
        if($request->has('english_pdf')) {
            $rules['english_pdf'] = 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.HOME_TENDER_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.HOME_TENDER_PDF_MIN_SIZE").'';
        }
        if($request->has('marathi_pdf')) {
            $rules['marathi_pdf'] = 'required|file|mimes:pdf|max:'.Config::get("AllFileValidation.HOME_TENDER_PDF_MAX_SIZE").'|min:'.Config::get("AllFileValidation.HOME_TENDER_PDF_MIN_SIZE").'';
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
        'tender_date' => 'Please enter date.',
        'english_pdf.required' => 'Please upload an PDF file.',
        'english_pdf.file' => 'The file must be of type: file.',
        'english_pdf.mimes' => 'The file must be a PDF.',
        'marathi_pdf.required' => 'कृपया PDF फाइल अपलोड करा.',
        'marathi_pdf.file' => 'फाइल प्रकार: फाइल होणे आवश्यक आहे.',
        'marathi_pdf.mimes' => 'फाइल पीडीएफ असावी.',
        'marathi_pdf.max' => 'कृपया पीडीएफ आकार जास्त नसावा. '.Config::get("AllFileValidation.HOME_TENDER_PDF_MAX_SIZE").'KB .',
        'marathi_pdf.min' => 'कृपया पीडीएफ आकार पेक्षा कमी नसावा.'.Config::get("AllFileValidation.HOME_TENDER_PDF_MIN_SIZE").'KB .',
        'english_pdf.max' => 'The pdf size must not exceed '.Config::get("AllFileValidation.HOME_TENDER_PDF_MAX_SIZE").'KB .',
        'english_pdf.min' => 'The image size must not be less than '.Config::get("AllFileValidation.HOME_TENDER_PDF_MIN_SIZE").'KB .',

    ];

    try {
        $validation = Validator::make($request->all(),$rules, $messages);
        if ($validation->fails()) {
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        } else {
            $update_tender = $this->service->updateAll($request);
            if ($update_tender) {
                $msg = $update_tender['msg'];
                $status = $update_tender['status'];
                if ($status == 'success') {
                    return redirect('list-home-tender')->with(compact('msg', 'status'));
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
            $tenders = $this->service->getById($request->show_id);
            return view('admin.pages.home.home_tender.show-tender', compact('tenders'));
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function destroy(Request $request){
        try {
            $tenders = $this->service->deleteById($request->delete_id);
            if ($tenders) {
                $msg = $tenders['msg'];
                $status = $tenders['status'];
                if ($status == 'success') {
                    return redirect('list-home-tender')->with(compact('msg', 'status'));
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