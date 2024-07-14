@extends("backend.layouts.master_layouts")

@section("title","User Role List | Leave Management System")

@section("content")

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Leave Types</h2>
    
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
    
            <h2 class="panel-title">Leave Types &nbsp; <a href="{{route('backend.leavetype.create')}}" class="btn btn-primary" >Add <i class="fa fa-plus"></i> </a></h2>
        </header>
        <div class="panel-body">
            @include('flash-message')
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Leave Type Name</th>
                        <th>Leave Balances</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leavetype as $item)
                    <tr>
                        <td>#{{$item->id}}</td>
                        <td>{{$item->leave_type_name}}</td>
                        <td>{{$item->leave_days}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>
                            <a href="{{route('backend.leavetype.byid', $item->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{route('backend.leavetype.delete', $item->id)}}" class="btn btn-danger">Danger</a>
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