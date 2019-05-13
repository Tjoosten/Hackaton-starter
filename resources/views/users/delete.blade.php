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
                    <h6 class="border-bottom border-gray pb-1 mb-3">Delete the account from <span class="font-weight-bold">{{ $user->name }}</span></h6>
                </form>
            </div>

            <div class="col-md-3">
                @include('users._partials.sidenav-admin', ['user' => $user])
            </div>
        </div>
    </div>
@endsection