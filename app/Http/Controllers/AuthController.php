<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\MasterRepositoryInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;

class AuthController extends Controller
{
    protected $masterRepository;
    public function __construct(MasterRepositoryInterface $masterRepository)
    {
        $this->masterRepository = $masterRepository;
    }

    public function get_page_login(Request $request)
    {
        return view('auth.get_page_login');
    }

    public function get_page_register(Request $request)
    {
        $department = $this->masterRepository->getDepartment();
        return view('auth.get_page_register', compact('department'));
    }

    public function get_forget_password(Request $request)
    {
        return view('auth.page_reset_password');
    }

    public function postSignIn(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|max:100',
                'password' => 'required|string|min:6|max:20',
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $email = $request->email;
            $password = $request->password;
            if (Auth::attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
                $request->session()->regenerate();
                return redirect()->intended('backend/dashboard');
            } else {
                return back()->with('error', 'The email & password is wrong.');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }
    public function postSignUp(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|confirmed|string|min:6',
                'department' => 'required',
            ]);

            if ($validator->fails()) {
                return back()->with('error', $validator->errors()->first());
            }

            $user = new User();
            $user->role_id = 1;
            $user->department_id = $request->department;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            if ($user) {
                return redirect('/signin')->with('success', 'The account created successfully.');
            } else {
                return back()->with('error', 'The email & password is wrong.');
            }
        } catch (\Exception $e) {
            $bugs = $e->getMessage();
            return back()->with('error', $bugs);
        }
    }

    public function userLogout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/signin');
    }
}
