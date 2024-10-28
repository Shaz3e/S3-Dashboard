@if (request()->routeIs('admin.settings.general'))
    <x-page-title title="{{ __('setting.title.general') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['label' => __('setting.breadcrumb.general')],
    ]" />
@endif

@if (request()->routeIs('admin.settings.auth'))
    <x-page-title title="{{ __('setting.title.auth') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['label' => __('setting.breadcrumb.auth')],
    ]" />
@endif

@if (request()->routeIs('admin.smtp-servers.index'))
    <x-page-title title="{{ __('smtp-server.title.index') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['label' => __('smtp-server.breadcrumb.index')],
    ]" />
@endif
@if (request()->routeIs('admin.smtp-servers.create'))
    <x-page-title title="{{ __('smtp-server.title.create') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['url' => route('admin.smtp-servers.index'), 'label' => __('smtp-server.breadcrumb.index')],
        ['label' => __('smtp-server.breadcrumb.create')],
    ]" />
@endif
@if (request()->routeIs('admin.smtp-servers.edit'))
    <x-page-title title="{{ __('smtp-server.title.edit') }}" :breadcrumbs="[
        ['url' => '/', 'label' => __('app.breadcrumb.dashboard')],
        ['url' => route('admin.smtp-servers.index'), 'label' => __('smtp-server.breadcrumb.index')],
        ['label' => __('smtp-server.breadcrumb.edit')],
    ]" />
@endif
