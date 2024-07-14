<?php

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * Login, Registration & Logout routes
 */

Route::get('/',[AuthController::class,'get_page_login'])->name('login'); 
Route::get('/signin',[AuthController::class,'get_page_login'])->name('login'); 
Route::get('/signup',[AuthController::class,'get_page_register']); 
Route::get('/forget-password',[AuthController::class,'get_forget_password']); 
Route::post('/post-sign-in',[AuthController::class,'postSignIn']); 
Route::post('/post-sign-up',[AuthController::class,'postSignUp']); 
Route::get('/user.logout',[AuthController::class,'userLogout'])->name('user.logout'); 


/**
 * all route for departments
 */
// Route::get('get-department', [MasterController::class, 'getDepartment']);
// Route::get('get-department-by-id/{id?}', [MasterController::class, 'getDepartmentById']);
// Route::post('create-department', [MasterController::class, 'createDepartment']);
// Route::post('update-department', [MasterController::class, 'updateDepartment']);
// Route::get('delete-department/{id?}', [MasterController::class, 'deleteDepartment']);

/**
 * all route for leave types
 */
// Route::get('get-leave-type', [MasterController::class, 'getLeaveType']);
// Route::get('get-leave-type-by-id/{id}', [MasterController::class, 'getLeaveTypeById']);
// Route::post('create-leave-type', [MasterController::class, 'createLeaveType']);
// Route::post('update-leave-type/{id}', [MasterController::class, 'updateLeaveType']);
// Route::get('delete-leave-type/{id?}', [MasterController::class, 'deleteLeaveType']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('backend')->group(function () {
        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('backend.dashboard');
        Route::get('/my-profile',[DashboardController::class,'myProfile'])->name('backend.my.profile');
        Route::get('/user-profile',[DashboardController::class,'userProfile'])->name('backend.user.profile');
        Route::post('/change.password',[DashboardController::class,'changePassword'])->name('backend.change.password');
        Route::post('/update-profile',[DashboardController::class,'updateProfile'])->name('backend.update.profile');

        Route::get('/approved-leaves',[DashboardController::class,'LeaveApprovedList'])->name('backend.approved-list');
        Route::get('/leave-requests',[DashboardController::class,'LeaveRequestsList'])->name('backend.requests');

        /** user employees routes list */
        Route::get('/employee-create',[DashboardController::class,'createEmployeePage'])->name('backend.employee.create');
        Route::get('/employee-list',[DashboardController::class,'employeeList'])->name('backend.employee.list');
        Route::get('/employee-byid/{id?}',[DashboardController::class,'employeeListById'])->name('backend.employee.byid');
        Route::post('/employee-save',[DashboardController::class,'employeeSave'])->name('backend.employee.save');
        Route::post('/employee-update',[DashboardController::class,'employeeUpdate'])->name('backend.employee.update');
        Route::get('/employee-delete/{id?}',[DashboardController::class,'employeeDelete'])->name('backend.employee.delete');

        /** roles routes list */
        Route::get('/roles',[MasterController::class,'getRolesList'])->name('backend.roles');
        Route::get('/roles-create',[MasterController::class,'createRolePage'])->name('backend.roles.create');
        Route::get('/roles-by-id/{id}',[MasterController::class,'getRoleById'])->name('backend.roles.byid');
        Route::post('/roles-save',[MasterController::class,'createRoles'])->name('backend.roles.save');
        Route::post('/roles-update',[MasterController::class,'updateRoles'])->name('backend.roles.update');
        Route::get('/roles-delete/{id}',[MasterController::class,'deleteRoles'])->name('backend.roles.delete');
        
        /** department route list */
        Route::get('department-create', [MasterController::class, 'createDepartmentPage'])->name('backend.department.create');
        Route::get('department-list', [MasterController::class, 'getDepartment'])->name('backend.department.list');
        Route::get('department-by-id/{id?}', [MasterController::class, 'getDepartmentById'])->name('backend.department.byid');
        Route::post('department-save', [MasterController::class, 'createDepartment'])->name('backend.department.save');
        Route::post('department-update', [MasterController::class, 'updateDepartment'])->name('backend.department.update');
        Route::get('department-delete/{id?}', [MasterController::class, 'deleteDepartment'])->name('backend.department.delete');
        
        /** leave type route list */
        Route::get('create-leave-type', [MasterController::class, 'createLeaveTypePage'])->name('backend.leavetype.create');
        Route::get('leave-type-list', [MasterController::class, 'getLeaveType'])->name('backend.leavetype.list');
        Route::get('leave-type-by-id/{id}', [MasterController::class, 'getLeaveTypeById'])->name('backend.leavetype.byid');
        Route::post('leave-type-save', [MasterController::class, 'createLeaveType'])->name('backend.leavetype.save');
        Route::post('leave-type-update/{id}', [MasterController::class, 'updateLeaveType'])->name('backend.leavetype.update');
        Route::get('leave-type-delete/{id?}', [MasterController::class, 'deleteLeaveType'])->name('backend.leavetype.delete');

        /** apply leave types */
        Route::post('/save-leave',[LeaveController::class,'saveLeave'])->name('backend.save-leave');
        Route::get('/apply-leave',[LeaveController::class,'applyLeave'])->name('backend.apply-leave');
        Route::get('/leave.balance',[LeaveController::class,'applyBalance'])->name('backend.leave.balance');
        Route::get('/leave-history',[LeaveController::class,'applyHistory'])->name('backend.leave.history');

    });
});