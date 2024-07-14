<aside id="sidebar-left" class="sidebar-left">
				
    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigation
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    @if (Auth::user()->role_id == 1)
                        <li>
                            <a href="{{route('backend.dashboard')}}">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-parent">
                            <a>
                                <i class="fa fa-copy" aria-hidden="true"></i>
                                <span>Department</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="{{route('backend.department.list')}}">
                                        Department List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('backend.department.create')}}">
                                        Create Department
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent">
                            <a>
                                <i class="fa fa-copy" aria-hidden="true"></i>
                                <span>Leave Type</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="{{route('backend.leavetype.list')}}">
                                        Leave Type List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('backend.leavetype.create')}}">
                                        Create Leave Type
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent">
                            <a>
                                <i class="fa fa-copy" aria-hidden="true"></i>
                                <span>Roles</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="{{route('backend.roles')}}">
                                        Roles List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('backend.roles.create')}}">
                                        Create Role
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-parent nav-active">
                            <a>
                                <i class="fa fa-copy" aria-hidden="true"></i>
                                <span>Employees</span>
                            </a>
                            <ul class="nav nav-children">
                                <li class="nav-active">
                                    <a href="{{route('backend.employee.list')}}">
                                        Employee List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('backend.employee.create')}}">
                                        Create Employee
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                        {{-- <li>
                            <a href="{{route('backend.approvals')}}">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                <span>Leave Approved</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('backend.requests')}}">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                <span>Leave Requests</span>
                            </a>
                        </li>     --}}
                    @endif

                    @if (Auth::user()->role_id == 3)
                        <li class="nav-parent">
                            <a>
                                <i class="fa fa-copy" aria-hidden="true"></i>
                                <span>Leave</span>
                            </a>
                            <ul class="nav nav-children">
                                <li>
                                    <a href="{{route('backend.apply-leave')}}">
                                        Apply Leave
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('backend.leave.balance')}}">
                                        Leave Balance
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('backend.leave.history')}}">
                                        Leave History
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li>
                            <a href="{{route('backend.apply-leave')}}">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                <span>Apply Leave</span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{route('backend.requests')}}">
                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                <span>Leave Requests</span>
                            </a>
                        </li>    
                    @endif
                    
                    
                </ul>
            </nav>
        </div>

    </div>

</aside>