<form action="{{ route('admin.smtp-servers.update', $smtpServer->id) }}" method="POST" class="needs-validation"
    novalidate>
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="row mb-3">
                    <label for="transport" class="col-sm-4 col-form-label">{{ __('smtp-server.table.transport') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="transport" :options="['smtp' => 'SMTP']" :selected="$smtpServer->transport" required="true"
                            help_text="{{ __('smtp-server.help_text.transport') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="host" class="col-sm-4 col-form-label">{{ __('smtp-server.table.host') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="text" name="host" value="{{ $smtpServer->host }}" required="true"
                            help_text="{{ __('smtp-server.help_text.host') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="port" class="col-sm-4 col-form-label">{{ __('smtp-server.table.port') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="number" name="port" value="{{ $smtpServer->port }}" required="true"
                            help_text="{{ __('smtp-server.help_text.port') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="encryption"
                        class="col-sm-4 col-form-label">{{ __('smtp-server.table.encryption') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="encryption" :options="['none' => 'None', 'ssl' => 'SSL', 'tls' => 'TLS']" :selected="$smtpServer->encryption" required="true"
                            help_text="{{ __('smtp-server.help_text.encryption') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="username"
                        class="col-sm-4 col-form-label">{{ __('smtp-server.table.username') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="text" name="username" required="true"
                            value="{{ $smtpServer->username }}"
                            help_text="{{ __('smtp-server.help_text.username') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="password"
                        class="col-sm-4 col-form-label">{{ __('smtp-server.table.password') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="text" name="password" required="true"
                            value="{{ $smtpServer->password }}"
                            help_text="{{ __('smtp-server.help_text.password') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="timeout" class="col-sm-4 col-form-label">{{ __('smtp-server.table.timeout') }}</label>
                    <div class="col-sm-8">
                        <x-form.input type="number" name="timeout" value="{{$smtpServer->timeout}}"
                            help_text="{{ __('smtp-server.help_text.timeout') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="auth_mode"
                        class="col-sm-4 col-form-label">{{ __('smtp-server.table.auth_mode') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="auth_mode" :options="[0 => 'Disable', 1 => 'Enable']" :selected="$smtpServer->auth_mode" required="true"
                            help_text="{{ __('smtp-server.help_text.auth_mode') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="active" class="col-sm-4 col-form-label">{{ __('smtp-server.table.active') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="active" :options="[0 => 'Disable', 1 => 'Enable']" :selected="$smtpServer->active" required="true"
                            help_text="{{ __('smtp-server.help_text.active') }}" />
                    </div>
                </div>
                {{-- /.row --}}
                <div class="row mb-3">
                    <label for="active" class="col-sm-4 col-form-label">{{ __('smtp-server.table.default') }}</label>
                    <div class="col-sm-8">
                        <x-form.select name="default" :options="[0 => 'Not Default', 1 => 'Default']" :selected="$smtpServer->default" required="true"
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
