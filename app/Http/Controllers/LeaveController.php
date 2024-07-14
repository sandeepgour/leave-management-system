<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\LeaveApproval;
use App\Models\LeaveRequest;
use App\Models\Department;
use App\Models\LeaveType;
use App\Models\Role;
use App\Models\User;

class LeaveController extends Controller
{
    /**
     * apply leave
     */
    public function ApplyLeave(Request $request){
        try {
            $leave_types = LeaveType::all();
            return view('backend.leave.create', compact('leave_types'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function applyBalance(Request $request){
        try {
            $leave_types = LeaveType::all();
            return view('backend.leave.create', compact('leave_types'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function applyHistory(Request $request){
        try {
            $leave_types = LeaveType::all();
            return view('backend.leave.create', compact('leave_types'));
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    /**
     * apply leave
     */
    public function saveLeave(Request $request){
        try {
            dd($request->all());
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

}
