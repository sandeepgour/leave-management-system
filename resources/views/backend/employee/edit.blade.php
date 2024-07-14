@extends("backend.layouts.master_layouts")

@section("title","User Role List | Leave Management System")

@section("content")

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Roles</h2>
    
        <div class="right-wrapper pull-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="{{url('backend/dashboard')}}">
                        <i class="fa fa-home"></i>
                    </a>
                </li>
                <li><span>Dashboard</span></li>
            </ol>
    
            <a class="sidebar-right-toggle"><i class="fa fa-chevron-left"></i></a>
        </div>
    </header>

    <!-- start: page -->
    <div class="col-md-8">
        <section class="panel">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="fa fa-caret-down"></a>
                    <a href="#" class="fa fa-times"></a>
                </div>
                <h2 class="panel-title">Edit Employee</h2>
            </header>
            <div class="panel-body">
                <div class="col-md-11">
                    @include('flash-message')
                    <form id="" action="{{route('backend.employee.update')}}" method="POST" class="form-horizontal form-bordered">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{$users->id}}">
                            <label class="col-sm-4 control-label">Select Role:</label>
                            <div class="col-sm-8">
                                <select name="role" id="roleId" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($roles as $item)
                                        <option value="{{$item->id}}" @if ($item->id==$users->role_id)
                                            @selected(true)
                                        @endif >{{$item->role_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Reporting Manager:</label>
                            <div class="col-sm-8">
                                <select name="reporting_manager" id="reporting_managerId" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($rm_list as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $users->reporting_manager_id)
                                            @selected(true)
                                        @endif>{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Select Department:</label>
                            <div class="col-sm-8">
                                <select name="department" id="departmentId" class="form-control">
                                    @foreach ($departments as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $users->department_id)
                                            @selected(true)
                                        @endif>{{$item->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Your Name:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" value="{{$users->name}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Your Email:</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" value="{{$users->email}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Your Password:</label>
                            <div class="col-sm-8">
                                <input type="text" value="password@12345" name="password" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Status:</label>
                            <div class="col-sm-8">
                                <select name="status" id="status" class="form-control">
                                        <option value="1" @if ($users->active == 1)
                                            @selected(true)
                                        @endif>Active</option>
                                        <option value="0" @if ($users->active == 0)
                                            @selected(true)
                                        @endif>In-active</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">&nbsp;&nbsp;&nbsp;</label>
                            <div class="col-sm-8">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <!-- end: page -->
</section>

@endsection