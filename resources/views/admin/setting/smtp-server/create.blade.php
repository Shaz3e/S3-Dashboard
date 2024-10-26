<form action="{{ route('admin.smtp-servers.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="row mb-3">
                    <label for="transport" class="col-sm-4 col-form-label">{{ __('smtp-server.table.transport') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="transport" :options="['smtp' => 'SMTP']" :selected="old('transport', $option ?? 'smtp')" required="true"
                            help_text="{{ __('smtp-server.help_text.transport') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="host" class="col-sm-4 col-form-label">{{ __('smtp-server.table.host') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="text" name="host" required="true"
                            help_text="{{ __('smtp-server.help_text.host') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="port" class="col-sm-4 col-form-label">{{ __('smtp-server.table.port') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="number" name="port" required="true"
                            help_text="{{ __('smtp-server.help_text.port') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="encryption"
                        class="col-sm-4 col-form-label">{{ __('smtp-server.table.encryption') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="encryption" :options="['none' => 'None', 'ssl' => 'SSL', 'tls' => 'TLS']" :selected="old('encryption', $option ?? 'none')" required="true"
                            help_text="{{ __('smtp-server.help_text.encryption') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="username" class="col-sm-4 col-form-label">{{ __('smtp-server.table.username') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="text" name="username" required="true"
                            help_text="{{ __('smtp-server.help_text.username') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="password"
                        class="col-sm-4 col-form-label">{{ __('smtp-server.table.password') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="text" name="password" required="true"
                            help_text="{{ __('smtp-server.help_text.password') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="timeout" class="col-sm-4 col-form-label">{{ __('smtp-server.table.timeout') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="number" name="timeout"
                            help_text="{{ __('smtp-server.help_text.timeout') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="auth_mode"
                        class="col-sm-4 col-form-label">{{ __('smtp-server.table.auth_mode') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="auth_mode" :options="[0 => 'Disable', 1 => 'Enable']" :selected="old('auth_mode', $option ?? 0)" required="true"
                            help_text="{{ __('smtp-server.help_text.auth_mode') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="active" class="col-sm-4 col-form-label">{{ __('smtp-server.table.active') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="active" :options="[0 => 'Disable', 1 => 'Enable']" :selected="old('active', $option ?? 0)" required="true"
                            help_text="{{ __('smtp-server.help_text.active') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="active" class="col-sm-4 col-form-label">{{ __('smtp-server.table.default') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="default" :options="[0 => 'Disable', 1 => 'Enable']" :selected="old('default', $option ?? 0)" required="true"
                            help_text="{{ __('smtp-server.help_text.default') }}" />
                    </div>
                </div>
                {{-- /.row --}}
            </div>
        </div>
        {{-- /.card-body --}}
        <div class="card-footer">
            <x-form.button />
        </div>
        {{-- /.card-footer --}}
    </div>
    {{-- /.card --}}
</form>

@push('styles')
@endpush

@push('scripts')
@endpush
