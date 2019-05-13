@extends ('layouts.admin')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">{{ $user->name }}</h1>
            <div class="page-subtitle">Delete account</div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="row">
            <div class="col-md-9">
                <form method="POST" action="{{ route('users.delete', $user) }}" class="card card-body border-0 shadow-sm">
                    @csrf               {{-- Form field protection --}}
                    @method('delete')   {{-- HTTP method spoofing --}}

                    <h6 class="border-bottom border-gray pb-1 mb-3">Delete your account</h6>

                    <p class="card-text text-danger">
                        <i class="fe fe-alert-triangle mr-1"></i> Your at the point of deleting your account from {{ config('app.name') }}
                    </p>

                    <p class="card-text">
                        By deleting your user account you cannot login anymore on {{ config('app.name') }} And all your data will also
                        be deleted. So by filling in your current password u can confirm the delete. 
                    </p>

                    <hr class="mt-0">

                    <div class="form-row">
                        <div class="form-group col-3">
                            <input type="password" class="form-control @error('current_password', 'is-invalid')" placeholder="Your current password" @input('current_password')>
                            @error('current_password')
                        </div>

                        <div class="form-group col-12 mb-0">
                            <button type="submit" class="btn shadow-sm btn-danger">Confirm</button>
                            <a href="{{ route('users.dashboard') }}" class="btn shadow-sm btn-light">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3">
                @include('users._partials.sidenav-settings', ['user' => $user])
            </div>
        </div>
    </div>
@endsection