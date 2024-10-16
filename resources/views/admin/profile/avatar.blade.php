<form action="{{ route('admin.profile.store') }}" method="POST" class="needs-validation" novalidate
    enctype="multipart/form-data">
    @csrf
    @method('post')
    <input type="hidden" name="selected_avatar" id="selected_avatar" value="">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ __('profile.card_heading.change_profile_picture') }}</h4>
                    <p class="card-text">{{ __('profile.card_text.change_profile_picture') }}</p>
                </div>
                {{-- /.card-body --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 mb-5">
                            <div class="row">
                                @foreach (range(1, 5) as $i)
                                    <div class="col">
                                        <img class="img-fluid avatar-image"
                                            src="{{ asset('avatars/avatar' . $i . '.png') }}"
                                            onclick="setAvatar('avatars/avatar{{ $i }}.png')">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="avatar">{{ __('profile.db.custom_profile_picture') }}</label>
                                <x-form.file-upload name="avatar"
                                    help_text="{{ __('profile.help_text.custom_profile_picture') }}" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- /.card-body --}}
                <div class="card-footer" id="allowUploadAvatar" style="display:none;">
                    <x-form.button name="changeAvatar" text="{{ __('profile.button.change_avatar') }}" />
                </div>
            </div>
            {{-- /.card --}}
        </div>
        {{-- /.col --}}
    </div>
    {{-- /.row --}}
</form>


@push('styles')
@endpush

@push('scripts')
    <script>
        $('#avatar').on('change', function() {
            $('#allowUploadAvatar').show();
        })

        function triggerFileInput() {
            document.getElementById('avatar').click();
        }

        function setAvatar(avatarPath) {
            var avatarInput = document.getElementById('selected_avatar');
            avatarInput.value = avatarPath;

            // Update the label text to display the selected file name
            var fileName = avatarPath.split('/').pop();
            var label = document.querySelector('#avatar');
            label.innerText = fileName;
            $('#allowUploadAvatar').show();
        }
    </script>
@endpush
