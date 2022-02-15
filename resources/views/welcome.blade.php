<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Elegant Themes</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito';
            background: #f7fafc;
        }
    </style>
</head>
<body>
    <div class="container-fluid fixed-top p-4">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-muted">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-muted">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ms-4 text-muted">Register</a>
                            @endif
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="container-fluid my-5 px-5">
        <div class="row justify-content-center px-4">
            <div class="col-md-12 col-lg-9">

                <x-auth-card>
                    <x-slot name="logo">
                        <a href="/">
                            <h2 class="text-dark">Subscribe</h2>
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
                                <x-input id="role" type="hidden" name="role" value="subscriber" required />
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
                                        {{ __('Already subscribed?') }}
                                    </a>
            
                                    <x-button>
                                        {{ __('Subscribe') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </x-auth-card>

                
            </div>
        </div>
    </div>
</body>
</html>
