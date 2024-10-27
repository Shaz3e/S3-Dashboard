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
                <li class="menu-title">{{ __('menu.main') }}</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="ri-dashboard-line"></i>
                        <span>{{ __('menu.dashboard') }}</span>
                    </a>
                </li>
                @can('client.list')
                    <li>
                        <a href="{{ route('admin.clients.index') }}" class="waves-effect">
                            <i class="ri-group-line"></i>
                            <span>{{ __('client.menu.index') }}</span>
                        </a>
                    </li>
                @endcan

                {{-- Roles & Permissions --}}
                @canany(['user.list', 'role.list', 'permission.list'])
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="ri-shield-user-line"></i>
                            <span>{{ __('menu.manage') }}</span>
                        </a>
                        <ul class="sub-menu mm-collapse" aria-expanded="false">
                            @can('user.list')
                                <li class="{{ request()->routeIs('admin.users.*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.users.index') }}"
                                        class="waves-effect {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                        {{ __('user.menu.index') }}
                                    </a>
                                </li>
                            @endcan
                            @can('email-templates.list')
                                <li
                                    class="{{ request()->routeIs(config('email-templates.route_prefix') . '.email-templates.*') ? 'mm-active' : '' }}">
                                    <a href="{{ route(config('email-templates.route_prefix') . '.email-templates.index') }}"
                                        class="waves-effect {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                                        {{ __('email-templates::email-templates.title.index') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role.list')
                                <li class="{{ request()->routeIs('admin.roles.*') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.roles.index') }}"
                                        class="waves-effect {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                                        {{ __('role.menu.index') }}
                                    </a>
                                </li>
                            @endcan
                            @can('permission.list')
                                <li class="{{ request()->routeIs('admin.permissions.index') ? 'mm-active' : '' }}">
                                    <a href="{{ route('admin.permissions.index') }}"
                                        class="waves-effect {{ request()->routeIs('admin.permissions.index') ? 'active' : '' }}">
                                        {{ __('permission.menu.index') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
