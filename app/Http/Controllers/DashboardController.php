<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\LeaveApproval;
use App\Models\LeaveRequest;
use App\Models\LeaveType;

class DashboardController extends Controller
{
    public function dashboard()
    {
        try {
            $user = Auth::user();
            if ($user->role_id == 2) {
                $userList = User::with(['role', 'department', 'reportingManager'])->where(['id' => $user->id])->orderBy('id', 'DESC')->get();
            } else {
                $userList = User::with(['role', 'department', 'reportingManager'])->orderBy('id', 'DESC')->get();
            }
            return view('backend.dashboard', compact('userList'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /** create employee page methods */
    public function createEmployeePage(Request $request)
    {
        try {
            $roles = Role::whereNotIn('id', [1])->get();
            $departments = Department::all();
            $rm_list = User::where(['role_id' => 2, 'active' => 1])->get();
            return view('backend.employee.create', compact('departments', 'rm_list', 'roles'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /** create employees list */
    public function employeeList(Request $request)
    {
        try {
            $userList = User::with(['role', 'department', 'reportingManager'])->where(['role_id' => 3, 'active' => 1])->orderBy('id', 'DESC')->get();
            return view('backend.employee.employees', compact('userList'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /** create employees */
    public function employeeSave(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'role' => 'required',
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'department' => 'required',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $user = new User();
            $user->role_id = $request->role;
            $user->department_id = $request->department;
            $user->reporting_manager_id  = (isset($request->reporting_manager)) ? $request->reporting_manager : NULL;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->active = $request->status;
            $user->save();

            if ($user) {
                return back()->with('success', 'The account created successfully.');
            } else {
                return back()->with('error', 'Some missing parameter.');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    /** create employees */
    public function employeeListById($user_id)
    {
        try {
            $users  = User::find($user_id);
            $roles = Role::whereNotIn('id', [1])->get();
            $departments = Department::all();
            $rm_list = User::where(['role_id' => 2, 'active' => 1])->get();
            //dd('$users : ', $users, '$roles : ', $roles, '$departments : ', $departments, '$rm_list : ', $rm_list);
            return view('backend.employee.edit', compact('departments', 'rm_list', 'roles', 'users'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    /** edit employee */
    public function employeeUpdate(Request $request)
    {
        try {
            $userId = $request->user_id;
            $validator = Validator::make($request->all(), [
                'role' => 'required',
                'name' => 'required',
                'email' => (!$userId) ? 'required|email|unique:users,email' : 'required|email',
                'password' => 'required|string|min:6',
                'department' => 'required',
                'status' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $user = User::find($userId);
            $user->role_id = $request->role;
            $user->department_id = $request->department;
            $user->reporting_manager_id  = (isset($request->reporting_manager)) ? $request->reporting_manager : NULL;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->active = $request->status;
            $user->update();

            if ($user) {
                return back()->with('success', 'The employee updated successfully.');
            } else {
                return back()->with('error', 'Some missing parameter.');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    /** delete employee */
    public function employeeDelete($user_id)
    {
        try {
            $users  = User::where(['id' => $user_id])->delete();
            if ($users) {
                return back()->with('success', 'The employee data deleted!');
            } else {
                return back()->with('error', 'Some error!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /** my-profile details */
    public function myProfile()
    {
        try {
            if (!empty(Auth::user())) {
                $departments = Department::all();
                $users = User::with(['role', 'department', 'reportingManager'])->where(['id' => Auth::user()->id])->first();
                return view('backend.my-profile', compact('departments', 'users'));
            } else {
                return back()->with('error', 'Some error!');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /** Change Password */
    public function changePassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'new_password' => 'required|min:6',
                'confirm_password' => 'required_with:new_password|same:new_password|min:6'
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            if (!Hash::check($request['old_password'], Auth::user()->password)) {
                return back()->with('error', 'The old password does not match our records.');
            }

            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            $user->password = Hash::make($request->new_password);
            $user->update();

            if ($user) {
                return back()->with('success', 'The change password updated successfully.');
            } else {
                return back()->with('error', 'Some missing parameter.');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /** Update Password */
    public function updateProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'department' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            //$user->role_id = $request->role;
            $user->department_id = $request->department;
            //$user->reporting_manager_id  = (isset($request->reporting_manager)) ? $request->reporting_manager : NULL;
            $user->name = $request->name;
            //$user->email = $request->email;
            //$user->password = Hash::make($request->password);
            //$user->active = $request->status;
            $user->update();

            if ($user) {
                return back()->with('success', 'The profile updated successfully.');
            } else {
                return back()->with('error', 'Some missing parameter.');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /**
     * leave request List
     */ 
    public function LeaveRequestsList(Request $request){
        try {
            $request_list = LeaveRequest::with(['employee','leaveType','leaveApprovals'])->orderBy('id','DESC')->get();
            dd('$request_list --', $request_list);
            return view('backend.requests.request', compact('request_list'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /**
     * get all approved leaves list
     */
    public function LeaveApprovedList(Request $request){
        try {
            $approval_list = LeaveApproval::with(['leaveRequest','approver'])->orderBy('id','DESC')->get();
            dd('$approval_list --', $approval_list);
            return view('backend.approved.approved', compact('approval_list'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }


}
