@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Users management</h1>
            <div class="page-subtitle">Dashboard</div>

            <div class="d-flex page-options">
                <a href="" class="btn btn-secondary">
                    <i class="fe fe-user-plus"></i>
                </a>

                <form method="GET" action="" class="form-search ml-2">
                    <input type="text" class="form-control border-0 shadow-sm" @input('term') placeholder="Search user">
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="card card-body border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-sm table-hover mb-0">
                    <thead>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">Name</th>
                            <th scope="col" class="border-top-0">Status</th>
                            <th scope="col" class="border-top-0">Email</th>
                            <th scope="col" class="border-top-0">Last seen</th>
                            <th scope="col" class="border-top-0">&nbsp;</th> {{-- Column only for the option shortcuts --}} 
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user) {{-- Users loop --}}
                            <tr>
                                <td><span class="font-weight-bold text-secondary"> #{{ $user->id }} </span></td>
                                <td>{{ $user->name }}</td>
                                
                                <td> {{-- Status indicator --}}
                                    @if ($user->isOnline())
                                        <span class="badge badge-online">Online</span>
                                    @else {{-- User is not online --}}
                                        <span class="badge badge-offline">Offline</span>
                                    @endif
                                </td> {{-- /// END status indicator --}}

                                <td>{{ $user->email }}</td>
                                <td>{{ optional($user->last_login_at)->diffForHumans() ?? '-' }}</td>

                                <td> {{-- Options --}}
                                    <span class="float-right">
                                        <a href="" class="text-decoration-none text-secondary mr-1">
                                            <i class="fe fe-eye"></i>
                                        </a>

                                        <a href="" class="text-decoration-none text-danger">
                                            <i class="fe fe-trash-2"></i>
                                        </a>
                                    </span>
                                </td> {{-- /// END options --}}
                            </tr>
                        @empty {{-- There are no users found in the application --}}
                        @endforelse {{-- END users loop --}}
                    </tbody>
                </table>
            </div> 

            {{ $users->render() }} {{-- Pagination view instance --}}
        </div>
    </div>
@endsection