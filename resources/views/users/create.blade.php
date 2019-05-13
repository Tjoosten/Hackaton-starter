@extends ('layouts.admin')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">User management</h1>
            <div class="page-subtitle">Create new user</div>

            <div class="d-flex page-options">
                <a href="{{ route('users.dashboard') }}" class="btn btn-secondary">
                    <i class="fe fe-users mr-1"></i> Overview
                </a>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <form method="POST" action="{{ route('users.store') }}" class="card card-body border-0 shadow-sm">
            <h6 class="border-bottom border-gray pb-1 mb-4">Create a new user</h6>
            @csrf {{-- form field protection --}}
            @include ('flash::message') {{-- Flash session view partial --}}

             <div class="form-row">
                <div class="col-3">
                    <h5>General information</h5>
                </div>

                <div class="offset-1 col-8">
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="firstname">Firstname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('firstname', 'is-invalid')" id="firstname" @input('firstname') placeholder="Firstname of the user">
                            @error('firstname')
                        </div>

                        <div class="form-group col-6">
                            <label for="lastname">Lastname <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lastname', 'is-invalid')" id="lastname" @input('lastname') placeholder="Lastname of the user">
                            @error('lastname')
                        </div>

                        <div class="form-group col-12">
                            <label for="email">E-mail address <span class="text-danger">*</span></label>
                            <input type="email" id="email" class="form-control @error('email', 'is-invalid')" placeholder="Email address of the user" @input('email')>
                            @error('email')
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-row">
                <div class="col-3">
                    <h5>Security and permissions</h5>
                </div>

                <div class="offset-1 col-8">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="role">Permission role(s) <span class="text-danger">*</span></label>

                            <select id="role" aria-describedby="roleHelpBlock" @input('roles[]') class="form-control @error('roles', 'is-invalid')" multiple>
                                @options($roles, 'roles', ['user'])
                            </select>

                            @if ($errors->has('roles'))
                                @error('roles')
                            @else {{-- Display the help text --}}
                                <small id="roleHelpBlock" class="form-text text-muted">
                                    You can assign multiple roles by pressing in your CTRL key.
                                </small>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-row">
                <div class="form-group col-12 mb-0"> 
                    <button type="sumbit" class="float-right btn btn-secondary">Toevoegen</button>
                </div>
            </div>
        </form>
    </div>
@endsection