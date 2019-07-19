@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">User management</h1>
            <div class="page-subtitle">Delete account</div>

            <div class="page-options d-flex">
                <a href="" class="text-secondary">
                    <a href="{{ route('users.dashboard') }}" class="btn btn-secondary">
                        <i class="fe fe-users mr-1"></i> Overview
                    </a>
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-md-9">
                <form method="POST" action="{{ route('users.delete', $user) }}" class="card card-body border-0 shadow-sm">
                    @csrf              {{-- Form field protection --}}
                    @method ('DELETE') {{-- HTTP method spoofing --}}

                    <h6 class="border-bottom border-gray pb-1 mb-3">Delete the account from <span class="font-weight-bold">{{ $user->name }}</span></h6>
                
                    <p class="card-text text-danger">
                        <i class="fe fe-alert-traingle mr-1"></i>
                        Your at the point for deleting the user account from <span class="font-weight-bold">{{ $user->name }}</span>
                    </p>

                    <p class="card-text">
                        By deleting the account from this user. he/she can't login anymore. And all the data will be deleted. So make 
                        sure if you want to proceed with the action by filling in the form below.
                    </p>

                    <hr class="mt-0">

                    <div class="form-row">
                        <div class="form-group col-6">
                            <input type="password" placeholder="Uw wachtwoord ter bevestiging" class="form-control @error('current_password', 'is-invalid')" @input('current_password')>
                            @error('current_password')
                        </div>

                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn shadow-sm btn-danger">Verwijder</button>
                            <a href="{{ route('users.dashboard') }}" class="btn shadow-sm btn-light">Annuleer</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3">
                @include('users._partials.sidenav', ['user' => $user])
            </div>
        </div>
    </div>
@endsection