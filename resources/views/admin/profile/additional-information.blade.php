<form action="{{ route('admin.profile.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('profile.card_heading.additional_information') }}</h4>
                    <p class="card-text">{{ __('profile.card_text.additional_information') }}</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">{{ __('profile.db.mobile') }}</label>
                                <x-form.input type="text" name="mobile" value="{{ $user->profile->mobile ?? '' }}"
                                    help_text="{{ __('profile.help_text.mobile_whatsapp') }}" required />
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('profile.db.whatsapp') }}</label>
                                <x-form.input type="text" name="whatsapp"
                                    value="{{ $user->profile->whatsapp ?? '' }}"
                                    help_text="{{ __('profile.help_text.mobile_whatsapp') }}" />
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('profile.db.skype') }}</label>
                                <x-form.input type="text" name="skype"
                                    value="{{ $user->profile->skype ?? '' }}" />
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('profile.db.country') }}</label>
                                <x-form.input type="text" name="country"
                                    value="{{ $user->profile->country ?? '' }}" />
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('profile.db.state') }}</label>
                                <x-form.input type="text" name="state"
                                    value="{{ $user->profile->state ?? '' }}" />
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('profile.db.city') }}</label>
                                <x-form.input type="text" name="city" value="{{ $user->profile->city ?? '' }}" />
                            </div>
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}
                    <div class="row mt-3">
                        <div class="col-md-6">
                            {{ __('profile.profile_created_at') }}: {{ $user->profile->created_at->diffForHumans() }}
                        </div>
                        <div class="col-md-6">
                            {{ __('profile.profile_updated_at') }}: {{ $user->profile->updated_at->diffForHumans() }}
                        </div>
                        {{-- /.col --}}
                    </div>
                    {{-- /.row --}}
                </div>
                {{-- /.card-body --}}
                <div class="card-footer">
                    <x-form.button name="additionalInformation" />
                </div>
                {{-- /.card-footer --}}
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}
</form>
@push('styles')
    <script src="{{ asset('assets/libs/select2/css/select2.min.css') }}"></script>
@endpush
@push('scripts')
    <script src="{{ asset('assets/libs/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            Inputmask({
                mask: "+{1,4}9{1,15}", // Allow country code to start with any digit and range from 1 to 4 digits

                placeholder: "+___________", // Customize placeholder to show a guide
                clearIncomplete: true // Ensures that incomplete numbers won't be submitted
            }).mask("#mobile, #whatsapp");
        });
    </script>
@endpush
