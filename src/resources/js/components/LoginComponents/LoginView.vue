<template>
  <main class="container vh-100 d-flex col col-xxl-3 col-md-5 col-sm-8 align-items-center justify-content-center"
        data-bs-theme="dark">
        <section class="w-100 mx-auto p-2 d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center p-3">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="50" height="50">
                    <mask id="smile">
                        <rect width="32" height="32" fill="white" />
                        <path fill="none" stroke-linecap="round" stoke-width="2" stroke="black"
                            d="M 6 19 C 8 30,24 30, 26 19" />
                    </mask>
                    <circle fill="#000000" cx="16" cy="16" r="15" />
                    <circle fill="#ffffff" mask="url(#smile)" cx="16" cy="16" r="14" />
                </svg> -->
                <span class="text-muted display-6">
                    Login
                </span>
            </div>
            <form class="w-100 card" method="POST" action="/oauth/login">
                <!-- @csrf -->
                <section class="px-4 my-5">
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            Email Address :
                        </label>
                        <input id="email" type="email" name="email" class="form-control" placeholder="email" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">
                            Password :
                        </label>
                        <div class="input-group">
                            <input id="password" name="password" type="password" class="form-control"
                                placeholder="password" />
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi-eye-fill"></i>
                            </span>
                        </div>
                    </div>
                    <div class="mb-2 d-flex justify-content-start">
                        <div class="btn-group" role="group">
                            <input id="remember" name="remember" type="checkbox" class="btn-check" />
                            <label for="remember" class="btn btn-sm text-muted btn-outline-light">Remember me</label>
                        </div>
                    </div>
                </section>
                <section class="d-flex flex-column px-4 my-3">
                    <button class="btn btn-lg btn-secondary w-100 mb-3" type="submit">
                        Login
                    </button>
                    <button class="btn btn-lg w-100" type="reset">
                        Cancel
                    </button>
                </section>
            </form>
        </section>
    </main>
</template>

<script setup>

</script>
