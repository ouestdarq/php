@extends('layout')
@section('content')
@if($errors->any())
<div class="w-100 alert alert-danger position-absolute">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<main class="container vh-100 d-flex col col-xxl-3 col-md-5 col-sm-8 align-items-center justify-content-center">
    <div class="w-100 h-50 mx-auto p-2">
        <div class="card-body d-flex flex-column align-items-center justify-content-center">
            <div class="w-50 d-flex flex-column align-items-center justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="100" height="100">
                    <mask id="smile">
                        <rect width="32" height="32" fill="white" />
                        <path fill="none" stroke-linecap="round" stoke-width="2" stroke="black"
                            d="M 6 19 C 8 30,24 30, 26 19" />
                    </mask>
                    <circle fill="#000000" cx="16" cy="16" r="15" />
                    <circle fill="#ffffff" mask="url(#smile)" cx="16" cy="16" r="14" />
                </svg>
                <span class="mb-3 display-6">
                    Oops!
                </span>
            </div>
            <form class="w-100 mb-5" method="POST" action="/accounts/login">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="name@example.com" />
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">
                        Password
                    </label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="********" />
                </div>
                <div class="mb-5 d-flex justify-content-start">
                    <div class="btn-group" role="group">
                        <input id="remember" name="remember" type="checkbox" class="btn-check" />
                        <label for="remember" class="btn btn-sm text-muted btn-outline-light">Remember me</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-lg btn-secondary w-50" type="submit">
                        Login
                    </button>
                    <button class="btn btn-lg w-50" type="reset">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection