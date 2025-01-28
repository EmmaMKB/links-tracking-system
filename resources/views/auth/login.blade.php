<x-guest-layout>
    @section('content')
        <div class="d-flex flex-center flex-column flex-lg-row-fluid">
            <div class="w-lg-500px p-10">
                <form class="form w-100" method="POST" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}">
                    <!--begin::Heading-->
                    @csrf
                    <div class="text-center mb-11">
                        <!--begin::Title-->
                        <h1 class="text-gray-900 fw-bolder mb-3">
                            Sign In
                        </h1>
                        <!--end::Title-->

                        <!--begin::Subtitle-->
                        <div class="text-gray-500 fw-semibold fs-6">
                            Links Tracking System
                        </div>
                        <!--end::Subtitle--->
                    </div>
                    <!--begin::Heading-->

                    <!--begin::Separator-->
                    <div class="separator separator-content my-14">
                        <span class="w-125px text-gray-500 fw-semibold fs-7">Enter your credentials</span>
                    </div>
                    <!--end::Separator-->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <!--begin::Input group--->
                    <div class="fv-row mb-8">
                        <!--begin::Email-->
                        <input type="text" placeholder="Email" name="email" required autocomplete="off"
                            class="form-control bg-transparent" />
                        <!--end::Email-->
                    </div>

                    <!--end::Input group--->
                    <div class="fv-row mb-3">
                        <!--begin::Password-->
                        <input type="password" placeholder="Password" name="password" required autocomplete="off"
                            class="form-control bg-transparent" />
                        <!--end::Password-->
                    </div>
                    <!--end::Input group--->

                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                        <div></div>
                        @if (Route::has('password.request'))
                            <p class="text-right">
                                <a class="link-primary" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            </p>
                        @endif
                    </div>
                    <!--end::Wrapper-->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <!--begin::Submit button-->
                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary">Sign In</button>
                    </div>
                    <!--end::Submit button-->

                </form>
            </div>
        </div>
    @endsection
</x-guest-layout>
