<?php
namespace App\Http\Services\Admin\Menu;

use App\Http\Repository\Admin\Menu\SubMenuRepository;


class SubMenuServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct()
    {
        $this->repo = new SubMenuRepository();
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
            $add_constitutionhistory = $this->repo->addAll($request);
            if ($add_constitutionhistory) {
                return ['status' => 'success', 'msg' => 'Sub Menu Added Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Sub Menu Not Added.'];
            }  
        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
        }      
    }

    public function updateAll($request) {
        try {
            $update_constitutionhistory = $this->repo->updateAll($request);
            if ($update_constitutionhistory) {
                return ['status' => 'success', 'msg' => 'Sub Menu Updated Successfully.'];
            } else {
                return ['status' => 'error', 'msg' => 'Sub Menu Not Updated.'];
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