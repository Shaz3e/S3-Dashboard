<div class="email-leftbar card">
    <div class="mail-list">
        @can('general-setting.list')
            <a href="{{ route('admin.settings.general') }}"
                class="{{ request()->routeIs('admin.settings.general') ? 'active' : '' }}">
                <i class="ri ri-arrow-right-s-line me-2"></i> {{ __('setting.menu.general') }}
            </a>
        @endcan
        @can('auth-setting.list')
            <a href="{{ route('admin.settings.auth') }}"
                class="{{ request()->routeIs('admin.settings.auth') ? 'active' : '' }}">
                <i class="ri ri-arrow-right-s-line me-2"></i> {{ __('setting.menu.auth') }}
            </a>
        @endcan
        @can('smtp-server.list')
            <a href="{{ route('admin.smtp-servers.index') }}"
                class="{{ request()->routeIs('admin.smtp-servers.*') ? 'active' : '' }}">
                <i class="ri ri-arrow-right-s-line me-2"></i> {{ __('smtp-server.menu.index') }}
            </a>
        @endcan
    </div>
</div>
