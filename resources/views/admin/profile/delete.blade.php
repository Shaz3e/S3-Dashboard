<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ __('profile.card_heading.delete_account') }}</h4>
                <p class="card-text">{{ __('profile.card_text.delete_account') }}</p>
            </div>
            {{-- /.card-body --}}
            <div class="card-body">
                <x-form.button type="button" class="btn-danger" text="{{ __('profile.button.delete_account') }}"
                    class="btn-danger" icon="ri-delete-bin-5-line" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" />
            </div>
            {{-- /.card-body --}}
        </div>
        {{-- /.card --}}
    </div>
    {{-- /.col --}}
</div>
{{-- /.row --}}

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.profile.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">
                        {{ __('profile.card_heading.delete_confirmation') }}
                    </h5>
                </div>
                <div class="modal-body">
                    <p>{{ __('profile.card_text.delete_confirmation') }}</p>

                    <div class="row">
                        <div class="col-6">
                            <x-form.input type="password" name="password" label="{{ __('profile.db.current_password') }}" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <x-form.button type="button" text="{{ __('button.close') }}" class="btn-light"
                        icon="ri-delete-bin-5-line" data-bs-dismiss="modal" />

                    <x-form.button name="deleteMyAccount" text="{{ __('profile.button.delete_account') }}"
                        class="btn-danger" icon="ri-delete-bin-5-line" />
                </div>
            </div>

        </form>
    </div>
</div>
