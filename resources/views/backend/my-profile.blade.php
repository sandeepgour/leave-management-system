@extends("backend.layouts.master_layouts")

@section("title","Admin Dashboard | Leave Management System")

@section("content")


<section role="main" class="content-body">
    <header class="page-header">
        <h2>User Profile</h2>
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

    <div class="row">
        <div class="col-md-12 col-lg-12">
            @include('flash-message')
            <div class="tabs">
                <ul class="nav nav-tabs tabs-primary">
                    <li class="active">
                        <a href="#overview" data-toggle="tab">Personal Information</a>
                    </li>
                    <li>
                        <a href="#edit" data-toggle="tab">Edit Information</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="overview" class="tab-pane active">
                        <form class="form-horizontal" method="get">
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Full Name.</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $users ? $users->name : ''}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Email.</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $users ? $users->email : ''}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="role_name">Role Name. </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $users->role ? $users->role->role_name : ''}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="department">Department</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="department" name="department" value="{{ $users->department ? $users->department->department_name : ''}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="reporting_manager">Reporting Manager</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="reporting_manager" name="reporting_manager" value="{{ $users->reportingManager ? $users->reportingManager->name : ''}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="status">Status</label>
                                    <div class="col-md-8">
                                        <button class="btn btn-success">Active</button>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="panel-footer">
                                {{-- <div class="row">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div> --}}
                            </div>
                        </form>
                    </div>
    
                    <div id="edit" class="tab-pane">
                        <form class="form-horizontal" method="post" action="{{route('backend.update.profile')}}">
                            <fieldset>
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="name">Full Name.</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $users ? $users->name : ''}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="email">Email.</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $users ? $users->email : ''}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="role_name">Role Name. </label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="role_name" name="role_name" value="{{ $users->role ? $users->role->role_name : ''}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="department">Department</label>
                                    <div class="col-md-8">
                                        <select name="department" id="department" class="form-control">
                                            @foreach ($departments as $item)
                                                <option value="{{$item->id}}" @if ($item->id == $users->department_id)
                                                    @selected(true)
                                                @endif>{{$item->department_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="reporting_manager">Reporting Manager</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" id="reporting_manager" name="reporting_manager" value="{{ $users->reportingManager ? $users->reportingManager->name : ''}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="submit">&nbsp; &nbsp; &nbsp;</label>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                        <hr class="tall">
                        <form class="form-horizontal" method="post" action="{{route('backend.change.password')}}">
                            <fieldset>
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="old_password">Old Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" id="old_password" name="old_password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="new_password">New Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" id="new_password" name="new_password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="confirm_password">Confirm Password. </label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label" for="submit">&nbsp; &nbsp; &nbsp;</label>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="panel-footer">
                                {{-- <div class="row">
                                    <div class="col-md-9 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </div> --}}
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end: page -->
</section>

@endsection