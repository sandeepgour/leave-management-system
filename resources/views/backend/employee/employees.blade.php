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
    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>
            </div>
    
            <h2 class="panel-title">Employees List &nbsp; <a href="{{ route('backend.employee.create')}}" class="btn btn-primary">Add</a>  </h2>
        </header>
        <div class="panel-body">
            @include('flash-message')
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>#UserId</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Role</th>
                        <th>Department</th>
                        <th>Reporting Manager</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userList as $user)
                    <tr class="gradeX">
                        <td>#{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role ? $user->role->role_name : ''}}</td>
                        <td>{{$user->department ? $user->department->department_name : ''}}</td>
                        <td>{{$user->reportingManager ? $user->reportingManager->name : ''}}</td>
                        <td>
                            <a href="{{route('backend.employee.byid',$user->id)}}" class="btn btn-sm btn-success">Edit</a>&nbsp;
                            <a href="{{route('backend.employee.delete',$user->id)}}" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
        
    <!-- end: page -->
</section>

@endsection