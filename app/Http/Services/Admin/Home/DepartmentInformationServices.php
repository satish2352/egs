<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\DepartmentInformationRepository;

use App\Models\DepartmentInformation;
use Carbon\Carbon;
use Config;

class DepartmentInformationServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DepartmentInformationRepository();
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
            $path = Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_ADD');
            $englishImageName = $last_id['englishImageName'];
            $englishImageName1 = $last_id['englishImageName1'];
            $marathiImageName = $last_id['marathiImageName'];
            $marathiImageName1 = $last_id['marathiImageName1'];           
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'english_image_new', $path, $englishImageName1);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);
            uploadImage($request, 'marathi_image_new', $path, $marathiImageName1);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Department Information Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Department Information get Not Added.'];
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

            $path = Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['english_image'])) {
                        removeImage(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['english_image']);
                    }
                }
                $englishImageName = $return_data['last_insert_id'] .'_' . rand(100000, 999999) . '_english_icon.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
                $disaster_mgt_data = DepartmentInformation::find($return_data['last_insert_id']);
                $disaster_mgt_data->english_image = $englishImageName;
                $disaster_mgt_data->save();
            }

            if ($request->hasFile('english_image_new')) {
                if ($return_data['english_image_new']) {
                    if (file_exists_s3(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['english_image_new'])) {
                        removeImage(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['english_image_new']);
                    }
                }
                $englishImageName = $return_data['last_insert_id'] .'_' . rand(100000, 999999) . '_english.' . $request->english_image_new->extension();
                uploadImage($request, 'english_image_new', $path, $englishImageName);
                $disaster_mgt_data = DepartmentInformation::find($return_data['last_insert_id']);
                $disaster_mgt_data->english_image_new = $englishImageName;
                $disaster_mgt_data->save();
            }

            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    if (file_exists_s3(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['marathi_image'])) {
                        removeImage(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['marathi_image']);
                    }
                }
                $marathiImageName = $return_data['last_insert_id'] .'_' . rand(100000, 999999) . '_marathi_icon.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);
                $disaster_mgt_data = DepartmentInformation::find($return_data['last_insert_id']);
                $disaster_mgt_data->marathi_image = $marathiImageName;
                $disaster_mgt_data->save();
            }

            if ($request->hasFile('marathi_image_new')) {
                if ($return_data['marathi_image_new']) {
                    if (file_exists_s3(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['marathi_image_new'])) {
                        removeImage(Config::get('DocumentConstant.HOME_DEPARTMENT_WEB_DELETE') . $return_data['marathi_image_new']);
                    }
                }
                $marathiImageName = $return_data['last_insert_id'] .'_' . rand(100000, 999999) . '_marathi.' . $request->marathi_image_new->extension();
                uploadImage($request, 'marathi_image_new', $path, $marathiImageName);
                $disaster_mgt_data = DepartmentInformation::find($return_data['last_insert_id']);
                $disaster_mgt_data->marathi_image_new = $marathiImageName;
                $disaster_mgt_data->save();
            }

            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Department Information Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Department Information Updated Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }
    public function updateOne($id)
    {
        return $this->repo->updateOne($id);
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