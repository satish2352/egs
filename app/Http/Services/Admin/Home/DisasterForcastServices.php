<?php
namespace App\Http\Services\Admin\Home;

use App\Http\Repository\Admin\Home\DisasterForcastRepository;

use App\DisasterForcast;
use Carbon\Carbon;


class DisasterForcastServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new DisasterForcastRepository();
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
            $add_disasterforcast = $this->repo->addAll($request);
            if ($add_disasterforcast) {
                return ['status' => 'success', 'msg' => 'Disaster Forecast Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Forecast Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request)
    {
        try {
            $update_disasterforcast = $this->repo->updateAll($request);
            if ($update_disasterforcast) {
                return ['status' => 'success', 'msg' => 'Disaster Forecast Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Disaster Forecast Not Updated.'];
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