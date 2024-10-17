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

                {{-- Roles & Permissions --}}
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ri-shield-user-line"></i>
                        <span>{{ __('menu.manage') }}</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">

                        <li class="{{ request()->routeIs('admin.roles.*') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.roles.index') }}"
                                class="waves-effect {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                                {{ __('role.menu.index') }}
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.permissions.index') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="waves-effect {{ request()->routeIs('admin.permissions.index') ? 'active' : '' }}">
                                {{ __('permission.menu.index') }}
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
