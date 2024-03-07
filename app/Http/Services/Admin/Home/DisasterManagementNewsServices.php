<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\DisasterManagementNewsRepository;

use App\Models\
{ DisasterManagementNews };
use Carbon\Carbon;
use Config;
use Storage;


class DisasterManagementNewsServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DisasterManagementNewsRepository();
    }
    public function getAll(){
        try {
            return $this->repo->getAll();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function addAll($request){
        try {
            $last_id = $this->repo->addAll($request);
            $path = Config::get('DocumentConstant.DISASTER_NEWS_ADD');
            $englishImageName = $last_id['englishImageName'];
            $marathiImageName = $last_id['marathiImageName'];
            uploadImage($request, 'english_image', $path, $englishImageName);
            uploadImage($request, 'marathi_image', $path, $marathiImageName);

            if ($last_id) {
                return ['status' => 'success', 'msg' => 'Disaster Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Not Added.'];
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
            $path = Config::get('DocumentConstant.DISASTER_NEWS_ADD');
            if ($request->hasFile('english_image')) {
                if ($return_data['english_image']) {
                    $delete_file_path_eng  = Config::get('DocumentConstant.DISASTER_NEWS_DELETE') . $return_data['english_image'];
                    if (file_exists_s3($delete_file_path_eng)) {
                        removeImage($delete_file_path_eng);
                    }
                }
                $englishImageName = $return_data['last_insert_id'] .'_' . rand(100000, 999999) . '_english.' . $request->english_image->extension();
                uploadImage($request, 'english_image', $path, $englishImageName);
                $disaster_mgt_data = DisasterManagementNews::find($return_data['last_insert_id']);
                $disaster_mgt_data->english_image = $englishImageName;
                $disaster_mgt_data->save();
            }
    
            if ($request->hasFile('marathi_image')) {
                if ($return_data['marathi_image']) {
                    $delete_file_path_marathi = Config::get('DocumentConstant.DISASTER_NEWS_DELETE') . $return_data['marathi_image'];
                    if (file_exists_s3($delete_file_path_marathi)) {
                        removeImage($delete_file_path_marathi);
                    }
                }
                $marathiImageName = $return_data['last_insert_id'] .'_' . rand(100000, 999999) . '_marathi.' . $request->marathi_image->extension();
                uploadImage($request, 'marathi_image', $path, $marathiImageName);
                $disaster_mgt_data = DisasterManagementNews::find($return_data['last_insert_id']);
                $disaster_mgt_data->marathi_image = $marathiImageName;
                $disaster_mgt_data->save();
            }
            
            if ($return_data) {
                return ['status' => 'success', 'msg' => 'Disaster Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Not Updated.'];
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