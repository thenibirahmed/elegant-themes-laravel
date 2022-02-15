<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo width="82" />
            </a>
        </x-slot>

        <div class="card-body">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-label for="email" :value="__('Email Address')" />

                    <x-input id="email" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Phone Number -->
                <div class="mb-3">
                    <x-label for="phone" :value="__('Phone Number')" />

                    <x-input id="phone" type="text" name="phone" :value="old('phone')" required />
                </div>

                <!-- Desired Budget -->
                <div class="mb-3">
                    <x-label for="budget" :value="__('Desired Budget')" />

                    <x-input id="budget" type="number" name="budget" :value="old('budget')" required />
                </div>

                <!-- Message -->
                <div class="mb-3">
                    <x-label for="budget" :value="__('Message')" />

                    <textarea name="message" id="message" class="form-control"></textarea>
                </div>

                <!-- Role -->
                <div class="mb-3">            
                    <x-input id="role" type="hidden" name="role" value="admin" required />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button>
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
