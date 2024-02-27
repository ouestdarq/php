<template>
  <div class="d-flex align-items-center justify-content-center p-3">
    <div clas="w-10">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="h-12 w-12">
        <mask id="smile">
          <rect width="32" height="32" fill="white" />
          <path fill="none" stroke-linecap="round" stoke-width="2" stroke="black" d="M 6 19 C 8 30,24 30, 26 19" />
        </mask>
        <circle fill="#currentColor" cx="16" cy="16" r="15" />
        <circle fill="#ffffff" mask="url(#smile)" cx="16" cy="16" r="14" />
      </svg>
    </div>
    <span class="text-muted display-6">Login</span>
  </div>
  <!-- <form class="w-100 card" method="POST" action="/oauth/login"> -->
  <form class="w-100 card">
    <section class="px-4 mt-4 mb-2">
      <div class="mb-3">
        <label for="email" class="form-label">Email Address : </label>
        <input id="email" class="form-control" type="email" name="email" placeholder="email@example.com" />
      </div>

      <div class="mb-4">
        <label for="password" class="form-label">Password : </label>
        <div class="input-group">
          <input id="password" class="form-control" name="password" type="password" placeholder="********" />
          <span class="input-group-text" id="basic-addon1">
            <i class="bi-eye-fill"></i>
          </span>
        </div>
      </div>

      <div class="d-flex justify-content-start">
        <div class="btn-group" role="group">
          <input id="remember" name="remember" type="checkbox" class="btn-check" />
          <label for="remember" class="btn btn-sm btn-outline-warning-subtle">Remember me</label>
        </div>
      </div>
    </section>

    <section class="d-flex flex-column px-4 my-3">
      <button class="w-100 btn btn-lg btn-primary-subtle mb-3" type="submit">
        Login
      </button>
      <button class="w-100 mb-3 btn btn-lg btn-outline-danger-subtle" type="reset">Cancel</button>

    </section>
  </form>
</template>

<script setup>


</script>
