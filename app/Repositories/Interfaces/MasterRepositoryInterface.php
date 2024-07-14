<?php

namespace App\Repositories\Interfaces;

interface MasterRepositoryInterface
{
    /**
     * for department all interfaces here
     */
    public function getDepartment();
    public function getDepartmentById($id);
    public function createDepartment(array $data);
    public function updateDepartment($id, array $data);
    public function deleteDepartment($id);

    /**
     * for leave type all interfaces here
     */
    public function getLeaveType();
    public function getLeaveTypeById($id);
    public function createLeaveType(array $data);
    public function updateLeaveType($id, array $data);
    public function deleteLeaveType($id);

    /**
     * for roles type all interfaces here
     */
    public function getRolesList();
    public function getRoleById($id);
    public function createRoles(array $data);
    public function updateRoles($id, array $data);
    public function deleteRoles($id);
}
