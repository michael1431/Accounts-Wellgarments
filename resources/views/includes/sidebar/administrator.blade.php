<li class="nav-item has-treeview {{ isActive(['user*','role*']) }}">
    <a href="#" class="nav-link {{ isActive(['user*','role*']) }}">
        <i class="nav-icon fas fa-users-cog"></i>
        <p>
            User Management
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="background-color: #292929">
        <li class="nav-item">
            <a href="{{ action('UserController@index') }}" class="nav-link {{ isActive('users') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ action('RoleController@index') }}" class="nav-link {{ isActive('roles') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Roles</p>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{ isActive(['download']) }}">
    <a href="{{ action('Hrm\HrmInformationController@download') }}" class="nav-link {{ isActive('download') }}">
        <i class="nav-icon fas fa-cloud-download-alt"></i>
        <p>
            Database Backup
            {{--<span class="right badge badge-danger">New</span>--}}
        </p>
    </a>
</li>

<li class="nav-item {{ isActive('hrm/setting/unit') }}">
    <a href="{{ url('hrm/setting/unit') }}" class="nav-link {{ isActive('hrm/setting/unit') }}">
        <i class="far fa-building nav-icon"></i>
        <p>Unit</p>
    </a>
</li>

<li class="nav-item {{ isActive(['compan*']) }}">
    <a href="{{ action('CompanyController@index') }}" class="nav-link {{ isActive('companies') }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Company Setup
            {{--<span class="right badge badge-danger">New</span>--}}
        </p>
    </a>
</li>