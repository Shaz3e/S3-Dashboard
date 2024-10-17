{{-- Favicon --}}
<div class="row mb-3">
    <div class="col-md-8">
        <label for="favicon">{{ __('setting.field_label.favicon') }}</label>
        <x-form.file-upload name="favicon" help_text="{{ __('setting.help_text.favicon') }}" />
    </div>
    {{-- /.col --}}
    <div class="col-md-4">
        @if (DiligentCreators('favicon'))
            <img src="{{ asset('storage/' . DiligentCreators('favicon')) }}" class="avatar rounded avatar-lg" />
        @else
            <img src="{{ asset('assets/images/favicon.png') }}" class="avatar rounded avatar-lg" />
        @endif
    </div>
    {{-- /.col --}}
</div>
{{-- /.row --}}
{{-- Small Logo --}}
<div class="row mb-3">
    <div class="col-md-8">
        <label for="logo_sm">{{ __('setting.field_label.logo_sm') }}</label>
        <x-form.file-upload name="logo_sm" help_text="{{ __('setting.help_text.logo_sm') }}" />
    </div>
    {{-- /.col --}}
    <div class="col-md-4 mt-2">
        @if (DiligentCreators('logo_sm'))
            <img src="{{ asset('storage/' . DiligentCreators('logo_sm')) }}" class="img-fluid mt-4" />
        @else
            <img src="{{ asset('assets/images/logo-sm.png') }}" class="img-fluid mt-4" />
        @endif
    </div>
    {{-- /.col --}}
</div>
{{-- /.row --}}
{{-- Light Logo --}}
<div class="row mb-3">
    <div class="col-md-8">
        <label for="logo_light">{{ __('setting.field_label.logo_light') }}</label>
        <x-form.file-upload name="logo_light" help_text="{{ __('setting.help_text.logo_light') }}" />
    </div>
    {{-- /.col --}}
    <div class="col-md-4 mt-2">
        @if (DiligentCreators('logo_light'))
            <img src="{{ asset('storage/' . DiligentCreators('logo_light')) }}" class="img-fluid mt-4" />
        @else
            <img src="{{ asset('assets/images/logo-light.png') }}" class="img-fluid mt-4" />
        @endif
    </div>
    {{-- /.col --}}
</div>
{{-- /.row --}}
{{-- Dark Logo --}}
<div class="row mb-3">
    <div class="col-md-8">
        <label for="logo_dark">{{ __('setting.field_label.logo_dark') }}</label>
        <x-form.file-upload name="logo_dark" help_text="{{ __('setting.help_text.logo_dark') }}" />
    </div>
    {{-- /.col --}}
    <div class="col-md-4 mt-2">
        @if (DiligentCreators('logo_dark'))
            <img src="{{ asset('storage/' . DiligentCreators('logo_dark')) }}" class="img-fluid mt-4" />
        @else
            <img src="{{ asset('assets/images/logo-dark.png') }}" class="img-fluid mt-4" />
        @endif
    </div>
    {{-- /.col --}}
</div>
{{-- /.row --}}
