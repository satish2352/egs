<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\DisasterManagementWebPortalRepository;

use App\Models\
{ 
    DisasterManagementWebPortal
};
use Carbon\Carbon;
use Config;

class DisasterManagementWebPortalServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DisasterManagementWebPortalRepository();
    }
    public function getAll()
    {
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addAll($request)
    {
        try {
            $last_id = $this->repo->addAll($request);
            $path = Config::get('DocumentConstant.HOME_DISATER_MGT_WEB_PORTAL_ADD');
            $englishImageName = $last_id . '_english.' . $request->english_image->extension();
            $marathiImageName = $last_id . '_marathi.' . $request->marathi_image->extension();
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Disaster Management Web Portal Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Management Web Portal get Not Added.'];
            }  
            
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function getById($id)
    {
        try {
            return $this->repo->getById($id);
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function updateAll($request)
    {
        try {
            $return_data = $this->repo->updateAll($request);
            $path = Config::get('DocumentConstant.HOME_DISATER_MGT_WEB_PORTAL_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    $delete_file_path_eng  = Config::get('DocumentConstant.HOME_DISATER_MGT_WEB_PORTAL_DELETE') . $return_data['english_image'];
                    if (file_exists_s3($delete_file_path_eng)) {
                        removeImage($delete_file_path_eng);
                    }
                }
                $englishImageName = $return_data['last_insert_id'] . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
                $disaster_mgt_data = DisasterManagementWebPortal::find($return_data['last_insert_id']);
                $disaster_mgt_data->english_image = $englishImageName;
                $disaster_mgt_data->save();
            }

            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    $delete_file_path_marathi = Config::get('DocumentConstant.HOME_DISATER_MGT_WEB_PORTAL_DELETE') . $return_data['marathi_image'];
                    if (file_exists_s3($delete_file_path_marathi)) {
                        removeImage($delete_file_path_marathi);
                    }
                }
                $marathiImageName = $return_data['last_insert_id'] . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);
                $disaster_mgt_data = DisasterManagementWebPortal::find($return_data['last_insert_id']);
                $disaster_mgt_data->marathi_image = $marathiImageName;
                $disaster_mgt_data->save();
            }

            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Disaster Management Web Portal Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Management Web Portal Not Updated.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function deleteById($id)
    {
        try {
            $delete = $this->repo->deleteById($id);
            if ($delete) {
                return ['status' => 'success', 'msg' => 'Deleted Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => ' Not Deleted.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        } 
    }


}