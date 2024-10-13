    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{route('dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->


            {{-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="forms-elements.html">
                            <i class="bi bi-circle"></i><span>Form Elements</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-layouts.html">
                            <i class="bi bi-circle"></i><span>Form Layouts</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-editors.html">
                            <i class="bi bi-circle"></i><span>Form Editors</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-validation.html">
                            <i class="bi bi-circle"></i><span>Form Validation</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Forms Nav --> --}}

            @if (auth()->user()->hasAnyPermission('user-delete', 'user-list', 'user-edit', 'user-create','role-delete', 'role-list', 'role-edit', 'role-create','permission-delete', 'permission-list', 'permission-edit', 'permission-create'))

            <li class="nav-heading">User Management</li>

            @if (auth()->user()->hasAnyPermission('user-delete', 'user-list', 'user-edit', 'user-create'))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('users.index') }}">
                        <i class="bi bi-person"></i>
                        <span>User</span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->hasAnyPermission('role-delete', 'role-list', 'role-edit', 'role-create'))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('roles.index') }}">
                        <i class="bi bi-person"></i>
                        <span>Roles</span>
                    </a>
                </li><!-- End Profile Page Nav -->
            @endif

            @if (auth()->user()->hasAnyPermission('permission-delete', 'permission-list', 'permission-edit', 'permission-create'))
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{ route('permission.index') }}">
                        <i class="bi bi-person"></i>
                        <span>Permission</span>
                    </a>
                </li>
            @endif
            @endif
        </ul>

    </aside><!-- End Sidebar-->
