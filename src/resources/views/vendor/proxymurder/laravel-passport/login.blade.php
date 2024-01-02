@extends('layout')
@section('content')
    @if ($errors->any())
        <div class="w-100 alert alert-danger position-absolute">
            <ul>
                @foreach ($errors->all() as $error)
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
                    <span class="mb-3 text-muted display-6">
                        Login
                    </span>
                </div>
                <form class="w-100 mb-5" method="POST" action="/oauth/login">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input id="email" type="email" name="email" class="form-control"
                            placeholder="name@example.com" />
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
    {{-- 
    <main
        class="bg-zinc-50 text-zinc-800 dark:bg-zinc-950 dark:text-zinc-50 font-mono container m-auto h-screen flex flex-row justify-center">
        <section class="flex flex-col justify-center w-full">
            <div class="mx-auto flex flex-row items-center p-6">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="h-12 w-12">
                    <mask id="smile">
                        <rect width="32" height="32" fill="white" />
                        <path fill="none" stroke-linecap="round" stoke-width="2" stroke="black"
                            d="M 6 19 C 8 30,24 30, 26 19" />
                    </mask>
                    <circle fill="#currentColor" cx="16" cy="16" r="15" />
                    <circle fill="#ffffff" mask="url(#smile)" cx="16" cy="16" r="14" />
                </svg>
                <h1 class="mt-1">
                    LOGIN
                </h1>
            </div>
            <form action="/oauth/login" method="POST"
                class="w-5/6 h-3/6 mx-auto border bg-white dark:bg-zinc-900 dark:border-zinc-800 rounded-lg flex flex-col justify-around">
                @csrf
                <section class="m-12">
                    <div class="pb-2 mb-4">
                        <label for="email">Email:</label>
                        <input type="email" name="email"
                            class="w-full p-2 border bg-neutral-50 dark:border-zinc-800 dark:bg-zinc-700 rounded">
                    </div>
                    <div class="pb-2 mb-8">
                        <label for="password">Password:</label>
                        <input type="password" name="password"
                            class="w-full p-2 border bg-neutral-50 dark:border-zinc-800 dark:bg-zinc-700 rounded">
                    </div>
                    <div class="inline-flex items-center">
                        <label class="relative flex items-center rounded-full cursor-pointer" htmlFor="check">
                            <input type="checkbox"
                                class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-blue-gray-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-8 before:w-8 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-gray-500 before:opacity-0 before:transition-opacity checked:border-gray-500 checked:bg-gray-500 checked:before:bg-gray-500 hover:before:opacity-10"
                                id="check" />
                            <span
                                class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20"
                                    fill="currentColor" stroke="currentColor" stroke-width="1">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </span>
                        </label>
                        <label class="mt-1 ml-3 cursor-pointer select-none" htmlFor="check">
                            Remember me
                        </label>
                    </div>
                </section>
                <section class="mx-12 my-6 flex flex-row flex-wrap">
                    <button
                        class="w-full mb-6 p-3 bg-zinc-50 dark:bg-zinc-700 rounded-xl hover:bg-indigo-500 hover:text-neutral-50 hover:border-off transition-all ease-in-out duration-300"
                        type="submit">Login</button>
                    <button class="w-full p-3 hover:text-rose-500 transition-all ease-in-out duration-300"
                        type="reset">Cancel</button>
                </section>
            </form>
        </section>
    </main> --}}
@endsection
