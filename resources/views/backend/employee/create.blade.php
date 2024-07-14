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
                <h2 class="panel-title">Create New Employees</h2>
            </header>
            <div class="panel-body">
                <div class="col-md-11">
                    @include('flash-message')
                    <form id="" action="{{route('backend.employee.save')}}" method="POST" class="form-horizontal form-bordered">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Select Role:</label>
                            <div class="col-sm-8">
                                <select name="role" id="roleId" class="form-control">
                                    <option value="">select</option>
                                    @foreach ($roles as $item)
                                        <option value="{{$item->id}}">{{$item->role_name}}</option>
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
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Select Department:</label>
                            <div class="col-sm-8">
                                <select name="department" id="departmentId" class="form-control">
                                    @foreach ($departments as $item)
                                        <option value="{{$item->id}}">{{$item->department_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Your Name:</label>
                            <div class="col-sm-8">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Your Email:</label>
                            <div class="col-sm-8">
                                <input type="email" name="email" class="form-control">
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
                                        <option value="1">Active</option>
                                        <option value="0">In-active</option>
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