<form action="{{ route('admin.profile.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('profile.card_heading.profile_information') }}</h4>
                    <p class="card-text">{{ __('profile.card_text.profile_information') }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <x-form.input label="{{ __('profile.db.name') }}" type="text" name="name"
                                    value="{{ auth()->user()->name }}" required />
                            </div>
                            <div class="form-group">
                                <x-form.input label="{{ __('profile.db.email') }}" type="text"
                                    name="email" value="{{ auth()->user()->email }}" required />
                            </div>
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}
                </div>
                {{-- /.card-body --}}
                <div class="card-footer">
                    <x-form.button name="profile" />
                </div>
                {{-- /.card-footer --}}
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}
</form>
