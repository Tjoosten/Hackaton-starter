@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-3">
        <div class="page-header">
            <h1 class="page-title">Activity audit</h1>
            <div class="page-subtitle">Overview</div>

            <div class="d-flex page-options">
                <form method="GET" action="" class="form-search ml-2">
                    <input type="text" class="form-control border-0 shadow-sm" @input('term') placeholder="Search log">
                </form>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-3">
        <div class="card card-body border-0 shadow-sm">
            <h6 class="border-bottom border-gray pb-1 mb-3">Internal activity logs</h6>

            <div class="table-responsive">
                <table class="table table-sm mb-0 table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="border-top-0">#</th>
                            <th scope="col" class="border-top-0">Causer</th>
                            <th scope="col" class="border-top-0">Category</th>
                            <th scope="col" class="border-top-0">Message</th>
                            <th scope="col" class="border-top-0">Happend at</th>
                        </th>
                    </thead>
                    <tbody>
                        @forelse ($logs as $log) {{-- Audit log loop --}}
                            <tr>
                            </tr>
                        @empty {{-- <There are no audit logs found  --}}
                            <tr>
                                <td class="text-secondary" colspan="5">
                                    There are currently no acivity logs found.
                                </td>
                            </tr>
                        @endforelse {{-- /// END item loop --}}
                    </tbody>
                </table>
            </div>

            {{ $logs->render() }} {{-- Pagination view instance --}}
        </div>
    </div>
@endsection