<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-fw fa-tachometer-alt nav-icon">
                        </i>
                        <p>
                            {{ trans('global.dashboard') }}
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/audit-logs*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/audit-logs*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-file-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.auditLog.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('tool_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/academic-years*") ? "menu-open" : "" }} {{ request()->is("admin/tools-degree-types*") ? "menu-open" : "" }} {{ request()->is("admin/tools-departments*") ? "menu-open" : "" }} {{ request()->is("admin/tools-section-ids*") ? "menu-open" : "" }} {{ request()->is("admin/toolssyllabus-years*") ? "menu-open" : "" }} {{ request()->is("admin/batches*") ? "menu-open" : "" }} {{ request()->is("admin/tools-courses*") ? "menu-open" : "" }} {{ request()->is("admin/course-enroll-masters*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/academic-years*") ? "active" : "" }} {{ request()->is("admin/tools-degree-types*") ? "active" : "" }} {{ request()->is("admin/tools-departments*") ? "active" : "" }} {{ request()->is("admin/tools-section-ids*") ? "active" : "" }} {{ request()->is("admin/toolssyllabus-years*") ? "active" : "" }} {{ request()->is("admin/batches*") ? "active" : "" }} {{ request()->is("admin/tools-courses*") ? "active" : "" }} {{ request()->is("admin/course-enroll-masters*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.tool.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('academic_year_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.academic-years.index") }}" class="nav-link {{ request()->is("admin/academic-years") || request()->is("admin/academic-years/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-calendar-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.academicYear.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tools_degree_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tools-degree-types.index") }}" class="nav-link {{ request()->is("admin/tools-degree-types") || request()->is("admin/tools-degree-types/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-graduation-cap">

                                        </i>
                                        <p>
                                            {{ trans('cruds.toolsDegreeType.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tools_department_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tools-departments.index") }}" class="nav-link {{ request()->is("admin/tools-departments") || request()->is("admin/tools-departments/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.toolsDepartment.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tools_section_id_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tools-section-ids.index") }}" class="nav-link {{ request()->is("admin/tools-section-ids") || request()->is("admin/tools-section-ids/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.toolsSectionId.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('toolssyllabus_year_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.toolssyllabus-years.index") }}" class="nav-link {{ request()->is("admin/toolssyllabus-years") || request()->is("admin/toolssyllabus-years/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.toolssyllabusYear.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('batch_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.batches.index") }}" class="nav-link {{ request()->is("admin/batches") || request()->is("admin/batches/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.batch.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tools_course_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tools-courses.index") }}" class="nav-link {{ request()->is("admin/tools-courses") || request()->is("admin/tools-courses/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.toolsCourse.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('course_enroll_master_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.course-enroll-masters.index") }}" class="nav-link {{ request()->is("admin/course-enroll-masters") || request()->is("admin/course-enroll-masters/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fab fa-cc-mastercard">

                                        </i>
                                        <p>
                                            {{ trans('cruds.courseEnrollMaster.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('transport_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/createvehicles*") ? "menu-open" : "" }} {{ request()->is("admin/create-drivers*") ? "menu-open" : "" }} {{ request()->is("admin/transport-routes*") ? "menu-open" : "" }} {{ request()->is("admin/vehicle-assigns*") ? "menu-open" : "" }} {{ request()->is("admin/transport-stops*") ? "menu-open" : "" }} {{ request()->is("admin/assign-students*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/createvehicles*") ? "active" : "" }} {{ request()->is("admin/create-drivers*") ? "active" : "" }} {{ request()->is("admin/transport-routes*") ? "active" : "" }} {{ request()->is("admin/vehicle-assigns*") ? "active" : "" }} {{ request()->is("admin/transport-stops*") ? "active" : "" }} {{ request()->is("admin/assign-students*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-bus">

                            </i>
                            <p>
                                {{ trans('cruds.transport.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('createvehicle_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.createvehicles.index") }}" class="nav-link {{ request()->is("admin/createvehicles") || request()->is("admin/createvehicles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-bus-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.createvehicle.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('create_driver_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.create-drivers.index") }}" class="nav-link {{ request()->is("admin/create-drivers") || request()->is("admin/create-drivers/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.createDriver.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transport_route_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transport-routes.index") }}" class="nav-link {{ request()->is("admin/transport-routes") || request()->is("admin/transport-routes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-map-marked-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transportRoute.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('vehicle_assign_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.vehicle-assigns.index") }}" class="nav-link {{ request()->is("admin/vehicle-assigns") || request()->is("admin/vehicle-assigns/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-taxi">

                                        </i>
                                        <p>
                                            {{ trans('cruds.vehicleAssign.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('transport_stop_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.transport-stops.index") }}" class="nav-link {{ request()->is("admin/transport-stops") || request()->is("admin/transport-stops/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.transportStop.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('assign_student_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.assign-students.index") }}" class="nav-link {{ request()->is("admin/assign-students") || request()->is("admin/assign-students/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-sliders-h">

                                        </i>
                                        <p>
                                            {{ trans('cruds.assignStudent.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('assign_student_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.studentprofiles.index") }}" class="nav-link {{ request()->is("admin/studentprofiles") || request()->is("admin/studentprofiles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.studentprofile.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                    @can('profile_password_edit')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                <i class="fa-fw fas fa-key nav-icon">
                                </i>
                                <p>
                                    {{ trans('global.change_password') }}
                                </p>
                            </a>
                        </li>
                    @endcan
                @endif
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt nav-icon">

                            </i>
                            <p>{{ trans('global.logout') }}</p>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
