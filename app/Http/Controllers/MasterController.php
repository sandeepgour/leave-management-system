<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\MasterRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    /**
     * Inject the MasterRepositoryInterface into a controller and use it to perform operations.
     */
    protected $masterRepository;
    public function __construct(MasterRepositoryInterface $masterRepository)
    {
        $this->masterRepository = $masterRepository;
    }

    /**
     * all Interfaces method for department related calling here
     */
    public function createDepartmentPage()
    {
        return view('backend.department.create');
    }

    public function getDepartment()
    {
        try {
            $department = $this->masterRepository->getDepartment();
            return view('backend.department.departments', compact('department'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function getDepartmentById($id)
    {
        try {
            $department = $this->masterRepository->getDepartmentById($id);
            return view('backend.department.edit', compact('department'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function createDepartment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'department_name' => 'required|unique:departments,department_name',
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $data = [
                'department_name' => $request->department_name, 'created_at' => Carbon::now(),
            ];

            $department = $this->masterRepository->createDepartment($data);
            if ($department) {
                return back()->with('success', 'department added successfully!');
            } else {
                return back()->with('error', 'Failed!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function updateDepartment(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'department_name' => 'required|unique:departments,department_name',
                'department_id' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $department_id = $request->department_id;
            $data = [
                'department_name' => $request->department_name,
            ];

            $department = $this->masterRepository->updateDepartment($department_id, $data);
            if ($department) {
                return back()->with('success', 'department updated successfully!');
            } else {
                return back()->with('error', 'Failed!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function deleteDepartment($id)
    {
        try {
            $department = $this->masterRepository->deleteDepartment($id);
            if ($department) {
                return back()->with('success', 'department deleted successfully!');
            } else {
                return back()->with('error', 'Failed!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /**
     * calling Interfaces leaveType methods here
     */
    public function createLeaveTypePage()
    {
        try {
            return view('backend.leavetype.create');
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function getLeaveType()
    {
        try {
            $leavetype = $this->masterRepository->getLeaveType();
            return view('backend.leavetype.leavetypes', compact('leavetype'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function getLeaveTypeById($id)
    {
        try {
            $leavetype = $this->masterRepository->getLeaveTypeById($id);
            return view('backend.leavetype.edit', compact('leavetype'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function createLeaveType(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'leave_type_name' => 'required|unique:leave_types,leave_type_name',
                'leave_days' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $data = ['leave_type_name' => $request->leave_type_name, 'leave_days'=>$request->leave_days];
            $leaveType = $this->masterRepository->createLeaveType($data);
            if ($leaveType) {
                return back()->with('success', 'Leave Type created successfully!');
            } else {
                return back()->with('error', 'Failed!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function updateLeaveType(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'leave_type_name' => 'required|leave_type_name|unique:leave_types,leave_type_name',
                'leave_days' => 'required|numeric',
                'leave_type_id' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $leave_type_id = $request->leave_type_id;
            $data = ['leave_type_name' => $request->leave_type_name, 'leave_days' => $request->leave_days, 'created_at' => Carbon::now()];
            $leaveType = $this->masterRepository->updateLeaveType($leave_type_id, $data);
            if ($leaveType) {
                return back()->with('success', 'Leave Type updated successfully!');
            } else {
                return back()->with('error', 'Failed!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function deleteLeaveType($id)
    {
        try {
            $IsDelete = $this->masterRepository->deleteLeaveType($id);
            if ($IsDelete) {
                return back()->with('success', 'Leave Type Delete Successfully!');
            } else {
                return back()->with('error', 'Leave Type Not Deleted!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /** role list method call and define here */
    public function createRolePage()
    {
        try {
            return view('backend.role.create');
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function getRolesList()
    {
        try {
            $roleList = $this->masterRepository->getRolesList();
            return view('backend.role.roles', compact('roleList'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function getRoleById($id)
    {
        try {
            $roleList = $this->masterRepository->getRoleById($id);
            return view('backend.role.edit', compact('roleList'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function createRoles(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'role_name' => 'required|unique:roles,role_name',
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $data = ['role_name' => $request->role_name];
            $role = $this->masterRepository->createRoles($data);
            if ($role) {
                return back()->with('success', 'Role Added successfully!');
            } else {
                return back()->with('error', 'Failed!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function updateRoles(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'role_name' => 'required|unique:roles,role_name',
            ]);
            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }
            $id = $request->role_id;
            $data = ['role_name' => $request->role_name];
            $role = $this->masterRepository->updateRoles($id, $data);
            if ($role) {
                return back()->with('success', 'Role Updated successfully!');
            } else {
                return back()->with('error', 'Failed!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function deleteRoles($id)
    {
        try {
            $IsDelete = $this->masterRepository->deleteRoles($id);
            if ($IsDelete) {
                return back()->with('success', 'Role Delete Successfully!');
            } else {
                return back()->with('error', 'Role Not Deleted!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
}
