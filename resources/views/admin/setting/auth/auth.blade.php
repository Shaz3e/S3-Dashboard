<form action="{{ route('admin.settings.auth.store') }}" method="POST" class="needs-validation" novalidate
    enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <x-form.select name="active" label="{{ __('setting.form.active') }}" :options="[0 => 'Disable', 1 => 'Enable']"
                        :selected="DiligentCreators('active') == 1 ? 1 : 0" help_text="{{ __('setting.help_text.active') }}" />
                </div>
                {{-- /.col --}}
            </div>
            {{-- /.row --}}
        </div>
        {{-- /.card-body --}}
        <div class="card-footer">
            <x-form.button text="{{ __('setting.button.auth_setting') }}" />
        </div>
        {{-- /.card-footer --}}
    </div>
    {{-- /.card --}}
</form>

@push('styles')
@endpush

@push('scripts')
@endpush
