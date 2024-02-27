@extends('layout')
@section('content')
<main class="container vh-100 d-flex col col-xxl-4 col-md-6 align-items-center justify-content-center">
    <div class="card w-100 h-25 mx-auto">
        <div class="card-header bg-white">
            <div class="p-1 d-flex align-items-center justify-content-start">
                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="50px" height="50px">
                    <defs>
                        <linearGradient id="logo-gradient" x1="100%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#efadce" />

                            <stop offset="100%" stop-color="#a6e9d5" />

                        </linearGradient>
                    </defs>
                    <mask id="smile">
                        <rect width="32" height="32" fill="white" />
                        <path fill="none" stroke-linecap="round" stroke-width="2" stroke="black"
                            d="M 6 19 C 8 30,24 30, 26 19" />
                    </mask>
                    <circle fill="url(#logo-gradient)" mask="url(#smile)" cx="16" cy="16" r="15" />
                </svg>
                <h2 class="mb-0 mt-1 winc-oops text-secondary">w.inc</h2>
                <span class="fs-6 text-secondary align-self-baseline">&#174</span>
            </div>
        </div>
        <div class="card-body d-flex flex-column align-items-center justify-content-center">
            <!-- Introduction -->
            <p><strong>{{ $client->name }}</strong> is requesting permission to access your account.</p>

            <!-- Scope List -->
            @if (count($scopes) > 0)
            <div class="scopes">
                <p><strong>This application will be able to:</strong></p>

                <ul>
                    @foreach ($scopes as $scope)
                    <li>
                        {{ $scope->description }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="w-75 d-flex justify-content-between">
                <!-- Authorize Button -->
                <form class="w-50" method="post" action="/oauth/authorize">
                    @csrf
                    <input type="hidden" name="state" value="{{ $request->state }}">
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    <input type="hidden" name="auth_token" value="{{ $authToken }}">
                    <button type="submit" class="btn btn-lg btn-secondary w-100">Authorize</button>
                </form>

                <!-- Cancel Button -->
                <form class="w-50" method="post" action="/oauth/authorize">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="state" value="{{ $request->state }}">
                    <input type="hidden" name="client_id" value="{{ $client->id }}">
                    <input type="hidden" name="auth_token" value="{{ $authToken }}">
                    <button class="btn btn-lg w-100">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection