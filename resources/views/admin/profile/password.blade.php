<form action="{{ route('admin.profile.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('profile.card_heading.change_password') }}</h4>
                    <p class="card-text">{{ __('profile.card_text.change_password') }}</p>
                </div>
                {{-- /.card-body --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="current_password">{{ __('profile.db.new_password') }}</label>
                                <x-form.input type="password" name="current_password" required />
                            </div>
                            <div class="form-group">
                                <label for="password">{{ __('profile.db.new_password') }}</label>
                                <x-form.input type="password" name="password" required />
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">{{ __('profile.db.confirm_password') }}</label>
                                <x-form.input type="password" name="confirm_password" required />
                            </div>
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}
                </div>
                {{-- /.card-body --}}
                <div class="card-footer">
                    <x-form.button name="changePassword" text="{{ __('profile.button.change_password') }}" />
                </div>
                {{-- /.card-footer --}}
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}
</form>
