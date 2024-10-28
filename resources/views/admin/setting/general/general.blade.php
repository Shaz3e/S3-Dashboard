<form action="{{ route('admin.settings.general.store') }}" method="POST" class="needs-validation" novalidate
    enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <x-form.input type="text" name="app_name" label="App Name" value="{{ config('app.name') }}" />
                </div>
                {{-- /.col --}}
                <div class="col-md-6">
                    <label for="app_timezone">Select Timezone</label>
                    {{ getAllTimeZonesSelectBox(old('app_timezone', config('app.timezone'))) }}
                </div>
                {{-- /.col --}}
                <div class="col-md-6">
                    <x-form.input type="text" name="app_url" label="App URL" value="{{ config('app.url') }}" />
                </div>
                {{-- /.col --}}
                <div class="col-md-6">
                    <x-form.input type="text" name="site_url" label="Site URL"
                        value="{{ DiligentCreators('site_url') ?? config('app.url') }}" required />
                </div>
                {{-- /.col --}}
                <div class="col-md-6">
                    <x-form.input type="text" name="mail_from_name" label="Name"
                        value="{{ DiligentCreators('mail_from_name') ?? config('mail.from.name') }}"
                        help_text="{{ __('setting.help_text.mail_from_name') }}" required />
                </div>
                {{-- /.col --}}
                <div class="col-md-6">
                    <x-form.input type="email" name="mail_from_email" label="Email"
                        value="{{ DiligentCreators('mail_from_email') ?? config('mail.from.address') }}"
                        help_text="{{ __('setting.help_text.mail_from_email') }}" required />
                </div>
                {{-- /.col --}}
            </div>
            {{-- /.row --}}

            @include('admin.setting.general.logos')
        </div>
        {{-- /.card-body --}}
        <div class="card-footer">
            <x-form.button text="{{ __('setting.button.general_setting') }}" />
        </div>
        {{-- /.card-footer --}}
    </div>
    {{-- /.card --}}
</form>

@push('styles')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
        });
    </script>
@endpush
