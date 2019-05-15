@extends('layouts.app')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Contact page</h1>
            <p class="lead">If you have a question or feedback feel free to contact us.</p>
        </div>
    </div>


    <div class="container pb-3">
        <form method="POST" action="{{ route('contact.response') }}" class="card card-body border-0 shadow-sm">
            @csrf {{-- Form field protection --}}
            @include ('flash::message') {{-- flash session view partial --}}

            <div class="form-row">
                <div class="col-4 form-group">
                    <input type="text" @input('name') class="form-control @error('name', 'is-invalid')" placeholder="Your name">
                    @error('name')
                </div>

                <div class="col-4 form-group">
                    <input type="email" @input('email') class="form-control @error('email', 'is-invalid')" placeholder="Your Email address">
                    @error('email')
                </div>

                <div class="col-4 form-group">
                    <input type="text" @input('phone_number') class="form-control @error('phone_number', 'is_invalid')" placeholder="Your phone number">
                    @error('phone_number')
                </div>

                <div class="col-12 form-group">
                    <input type="text" @input('subject') class="form-control" @error('subject', 'is_invalid') placeholder="Subject">
                    @error('subject')
                </div>
                
                <hr>

                <div class="col-12 form-group">
                    <textarea class="form-control @error('message', 'is-invalid')" @input('message') rows="6" placeholder="Your message">@text('description')</textarea>
                    @error('message')
                </div>
            </div>

            <hr class="mt-0">

            <div class="form-row">
                <div class="form-group col-12 mb-0">
                    <button type="submit" class="btn btn-secondary">
                        <i class="fe fe-send mr-2"></i> Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection