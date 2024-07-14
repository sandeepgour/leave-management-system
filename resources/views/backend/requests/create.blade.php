@extends("backend.layouts.master_layouts")

@section("title","Apply Leave | Leave Management System")

@section("content")

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Apply Leave</h2>
    
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
                <h2 class="panel-title">Apply Leave</h2>
            </header>
            <div class="panel-body">
                <div class="col-md-11">
                    @include('flash-message')
                    <form id="" action="{{route('backend.leavetype.save')}}" method="POST" class="form-horizontal form-bordered">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Leave Type Name:</label>
                            <div class="col-sm-8">
                                <input type="text" name="leave_type_name" class="form-control" value="{{ old('leave_type_name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Leave Days:</label>
                            <div class="col-sm-8">
                                <input type="text" name="leave_days" class="form-control" value="{{ old('leave_days') }}">
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