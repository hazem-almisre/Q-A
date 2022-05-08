@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('s tatus') }}
                            </div>
                        @endif
                        {{ __('You are logged in!') }}
                        <script>
                            window.location.href = "http://127.0.0.1:8000/profile/index";
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
