@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">{{ $currentUser->name }}</h1>
            <div class="page-subtitle">Security settings</div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-md-9">
                <form method="POST" action="{{ route('profile.settings.update.security') }}" class="card card-body border-0 shadow-sm">
                    <h6 class="border-bottom border-gray pb-1 mb-3">Account security</h6>

                    @method ('PATCH')           {{-- HTTP method spoofing --}}
                    @csrf                       {{-- Form field protection --}}
                    @include('flash::message')  {{-- Flash session view partial --}}

                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="currentPassword">Current password   <span class="text-danger">*</span></label>
                            <input id="currentPassword" type="password" class="form-control @error('current_password', 'is-invalid')" placeholder="Your current password" @input('current_password')>
                            @error('current_password')
                        </div>

                        <div class="form-group col-6">
                            <label for="password">New password <span class="text-danger">*</span></label>
                            <input id="password" type="password" class="form-control @error('password', 'is-invalid')" placeholder="Your new password" @input('password')>
                            @error('password')
                        </div>

                        <div class="form-group col-6">
                            <label for="repeatPassword">Repeat password <span class="text-danger">*</span></label>
                            <input id="repeatPassword" type="password" class="form-control" @input('password_confirmation') placeholder="Repeat your new password">
                        </div>
                    </div>

                    <hr class="mt-0">

                    <div class="form-row">
                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn btn-secondary">Update</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3">
                @include ('users._partials.sidenav-settings')
            </div>
        </div>
    </div>
@endsection