<?php
namespace App\Http\Repository\Admin\Home;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
// use Session;
use App\Models\ {
	EmergencyContact
};

class EmergencyContactRepository  {
	public function getAll()
    {
        try {
            return EmergencyContact::all();
        } catch (\Exception $e) {
            return $e;
        }
    }

	public function addAll($request)
{
    try {
        
        $contact_data = new EmergencyContact();  
        $contact_data->english_title = $request['english_title'];
        $contact_data->marathi_title = $request['marathi_title'];
        $contact_data->english_name = $request['english_name'];
        $contact_data->marathi_name = $request['marathi_name'];
        $contact_data->english_address = $request['english_address'];
        $contact_data->marathi_address = $request['marathi_address'];
        $contact_data->email = $request['email'];
        $contact_data->english_number = $request['english_number'];
        $contact_data->marathi_number = $request['marathi_number'];
        $contact_data->english_landline_no = $request['english_landline_no'];
        $contact_data->marathi_landline_no = $request['marathi_landline_no'];
        $contact_data->save();       
              
		return $contact_data;

    } catch (\Exception $e) {
        return [
            'msg' => $e,
            'status' => 'error'
        ];
    }
}

public function getById($id)
{
    try {
        $contact = EmergencyContact::find($id);
        if ($contact) {
            return $contact;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
		return [
            'msg' => 'Failed to get by id Contact.',
            'status' => 'error'
        ];
    }
}
public function updateAll($request)
{
    try {
        $contact_data = EmergencyContact::find($request->id);
        
        if (!$contact_data) {
            return [
                'msg' => 'Contact not found.',
                'status' => 'error'
            ];
        }
        $contact_data->english_title = $request['english_title'];
        $contact_data->marathi_title = $request['marathi_title'];
        $contact_data->english_name = $request['english_name'];
        $contact_data->marathi_name = $request['marathi_name'];
        $contact_data->english_address = $request['english_address'];
        $contact_data->marathi_address = $request['marathi_address'];
        $contact_data->email = $request['email'];
        $contact_data->english_number = $request['english_number'];
        $contact_data->marathi_number = $request['marathi_number'];
        $contact_data->english_landline_no = $request['english_landline_no'];
        $contact_data->marathi_landline_no = $request['marathi_landline_no'];
        $contact_data->save();        
     
        return [
            'msg' => 'Contact updated successfully.',
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return $e;
        return [
            'msg' => 'Failed to update Contact.',
            'status' => 'error'
        ];
    }
}

public function updateOne($request)
{
    try {
        $contact = EmergencyContact::find($request); // Assuming $request directly contains the ID        
        if ($contact) {
            $is_active = $contact->is_active === 1 ? 0 : 1;
            $contact->is_active = $is_active;
            $contact->save();

            return [
                'msg' => 'Contact updated successfully.',
                'status' => 'success'
            ];
        }

        return [
            'msg' => 'Contact not found.',
            'status' => 'error'
        ];
    } catch (\Exception $e) {
        return [
            'msg' => 'Failed to update Contact.',
            'status' => 'error'
        ];
    }
}


public function deleteById($id)
{
    try {
        $contact = EmergencyContact::find($id);
        if ($contact) {
            
            $contact->delete();
            
            return $contact;
        } else {
            return null;
        }
    } catch (\Exception $e) {
        return $e;
    }
}
       
}