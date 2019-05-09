@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">{{ $currentUser->name }}</h1>
            <div class="page-subtitle">Information settings</div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-md-9">
                <form method="POST" action="{{ route('profile.settings.update.info') }}" class="card card-body border-0 shadow-sm">
                    <h6 class="border-bottom border-gray pb-1 mb-3">Account information</h6>

                    @method ('PATCH')           {{-- HTTP method spoofing --}}
                    @csrf                       {{-- Form field protection --}}
                    @form($user)                {{-- Bind user data to the form --}}
                    @include ('flash::message') {{-- Flash session view partial --}}

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="firstname">Firstname <span class="text-danger">*</span></label>
                            <input id="firstname" type="text" class="form-control @error('firstname', 'is-invalid')" placeholder="Your firstname" @input('lastname')>
                            @error('firstname')
                        </div>

                        <div class="form-group col-6">
                            <label for="lastname">Lastname <span class="text-danger">*</span></label>
                            <input id="lastname" type="text" class="form-control @error('lastname', 'is-invalid')" placeholder="Your lastname" @input('lastname')>
                            @error('lastname')
                        </div>

                        <div class="form-group col-12">
                            <label for="email">E-mail address <span class="text-danger">*</span></label>
                            <input id="email" type="email" class="form-control @error('email', 'is-invalid')" placeholder="Your meail address" @input('email')>
                            @error('email')
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