<?php

namespace App\Repositories;

use App\Repositories\Interfaces\MasterRepositoryInterface;
use App\Models\Department;
use App\Models\LeaveType;
use App\Models\Role;
use App\Models\User;

/**
 * Create a Master Repository class & Implements to MasterRepositoryInterfaces methods
 */
class MasterRepository implements MasterRepositoryInterface
{
    /**
     * all method for department related
     */
    public function getDepartment()
    {
        return Department::all();
    }

    public function getDepartmentById($id)
    {
        return Department::find($id);
    }

    public function createDepartment(array $data)
    {
        return Department::create($data);
    }

    public function updateDepartment($id, array $data)
    {
        $record = Department::where('id', $id)->update($data);
        if ($record) {
            return Department::where('id', $id)->first();
        }
        return null;
    }

    public function deleteDepartment($id)
    {
        $record = Department::where('id', $id)->delete();
        if ($record) {
            return true;
        }
        return false;
    }

    /**
     * all methods for Leave types related
     */
    public function getLeaveType()
    {
        return LeaveType::all();
    }

    public function getLeaveTypeById($id)
    {
        return LeaveType::find($id);
    }

    public function createLeaveType(array $data)
    {
        return LeaveType::insert($data);
    }

    public function updateLeaveType($id, array $data)
    {
        $record = LeaveType::where('id', $id)->update($data);
        if ($record) {
            return LeaveType::where('id', $id)->first();
        }
        return null;
    }

    public function deleteLeaveType($id)
    {
        $record = LeaveType::where('id', $id)->delete();
        if ($record) {
            return true;
        }
        return false;
    }

    /**
     * for roles type all interfaces here
     */
    public function getRolesList()
    {
        return Role::orderBy('id', 'DESC')->get();
    }
    public function getRoleById($id)
    {
        return Role::find($id);
    }
    public function createRoles(array $data)
    {
        return Role::insert($data);
    }
    public function updateRoles($id, array $data)
    {
        $record = Role::where('id', $id)->update($data);
        if ($record) {
            return Role::where('id', $id)->first();
        }
        return null;
    }
    public function deleteRoles($id){
        $record = Role::where('id', $id)->delete();
        if ($record) {
            return true;
        }
        return false;
    }
}
