<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                <img src="{{ auth()->user()->profile && auth()->user()->profile->avatar
                    ? (str_contains(auth()->user()->profile->avatar, 'avatars/avatar')
                        ? asset(auth()->user()->profile->avatar) // Predefined avatar
                        : asset('storage/' . auth()->user()->profile->avatar)) // Uploaded avatar
                    : asset('avatars/avatar.png') }}"
                    alt="{{ auth()->user()->name }}" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1"><x-auth-name /></h4>
                {{-- <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online
                </span> --}}
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                {{-- Complaints --}}
                @can('complaint.list')
                    <li>
                        <a href="{{ route('admin.complaints.index') }}" class="waves-effect">
                            <i class="ri-file-edit-line"></i>
                            <span>Complaint</span>
                        </a>
                    </li>
                @endcan
                @can('complaint_type.list')
                    <li>
                        <a href="{{ route('admin.complaint_types.index') }}" class="waves-effect">
                            <i class="ri-file-edit-line"></i>
                            <span>Complaint Type</span>
                        </a>
                    </li>
                @endcan

                {{-- Towns --}}
                @canany(['town.list'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-community-line"></i>
                            <span>Manage Towns or UC</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            @can('town.list')
                                <li class="{{ request()->routeIs('admin.towns.*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.towns.index') }}"
                                        class="waves-effect {{ request()->routeIs('admin.towns.*') ? 'active' : '' }}">
                                        Towns
                                    </a>
                                </li>
                            @endcan
                            @can('uc.list')
                                <li class="{{ request()->routeIs('admin.ucs.*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.ucs.index') }}"
                                        class="waves-effect {{ request()->routeIs('admin.ucs.*') ? 'active' : '' }}">
                                        UCs
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany

                {{-- Users --}}
                @can(['user.list'])
                    <li>
                        <a href="{{ route('admin.users.index') }}"
                            class="waves-effect {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                            <i class="ri-user-line"></i>
                            <span>Users</span>
                        </a>
                    </li>
                @endcan

                {{-- Roles & Permissions --}}
                @hasanyrole(['superadmin'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-shield-user-line"></i>
                            <span>Manage Roles</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            @can('role.list')
                                <li class="{{ request()->routeIs('admin.roles-permissions.roles.*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.roles-permissions.roles.index') }}"
                                        class="waves-effect {{ request()->routeIs('admin.roles-permissions.roles.*') ? 'active' : '' }}">
                                        Roles
                                    </a>
                                </li>
                            @endcan
                            @can('permission.list')
                                <li
                                    class="{{ request()->routeIs('admin.roles-permissions.permissions.*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.roles-permissions.permissions.index') }}"
                                        class="waves-effect {{ request()->routeIs('admin.roles-permissions.permissions.*') ? 'active' : '' }}">
                                        Permissions
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endhasanyrole
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
