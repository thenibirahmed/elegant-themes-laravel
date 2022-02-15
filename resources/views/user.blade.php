<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('User profile information') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">

            <h2 class="mb-3">User Profile Information</h2>

            <h4>Name: {{ $user->name }}</h4>
            <h4>Email: {{ $user->email }}</h4>
            <h4>Phone: {{ $user->phone }}</h4>
            <h4>Budget: {{ $user->budget }}</h4>
            <h4>Message: {{ $user->message }}</h4>
            <h4>Joined At: {{ $user->created_at->format("d M Y") }}</h4>
            
        </div>
    </div>
    <x-slot name="footer"></x-slot>
</x-app-layout>