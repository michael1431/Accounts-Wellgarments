<!-- Brand Logo -->
<a href="{{ url('/') }}" class="brand-link bg-{{settings('theme')}}">
    <img src="{{ asset('favicon.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Ringer ERP 1.0</span>
</a>

<!-- Sidebar -->
<div class="sidebar nano">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <!--<img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">-->
            <img src="{{ asset('dist/img/cdf logo.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ action('UserController@show') }}" class="d-block">{{app_info()->company_name}}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item {{ isActive(['/','dashboard*']) }}">
                <a href="{{ action('DashboardController@index') }}" class="nav-link {{ isActive('/') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @include('includes.sidebar.accounts')
            {{-- <!--@can('administrator')-->
                <!--@include('includes.sidebar.administrator')-->
            <!--@endcan-->

            @can('accounts')
                @include('includes.sidebar.accounts')
            @endcan --}}
            @php $active = ['change-password']; @endphp
            <li class="nav-item {{ isActive($active) }}">
                <a href="{{ url('change-password') }}" class="nav-link {{ isActive($active) }} main-menu">
                    <i class="nav-icon fas fa-key"></i>
                    <p> Change Password </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
