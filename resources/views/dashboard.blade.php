<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="card my-4">
        <div class="card-body">

            @if ( auth()->user()->role == "admin" )
                <h2 class="mb-3">Users</h2>
                <table class="table table-striped table-hover"> 
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email Address</th>
                        <th>Desired Budget</th>
                        <th>Message</th>
                        <th>Actions</th>
                        <th>Create WordPress Account</th>
                    </tr>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->budget }}</td>
                            <td>{{ $user->message }}</td>
                            <td><a href="{{ route("user",["user"=>$user->id]) }}">Show User</a></td>
                            <td>
                                <button class="btn btn-primary text-light btn-sm wp" data-id="{{ $user->id }}"
                                    data-name="{{ $user->name }}" data-email="{{ $user->email }}">
                                    Create WordPress Account
                                </button>
                            </td>
                        </tr>
                    @empty
                        <h3>No Users Found</h3>
                    @endforelse
                    
                </table>

                {{ $users->links() }}
            @else

                <h2 class="mb-3">Profile Information</h2>

                <h4>Name: {{ auth()->user()->name }}</h4>
                <h4>Email: {{ auth()->user()->email }}</h4>
                <h4>Phone: {{ auth()->user()->phone }}</h4>
                <h4>Budget: {{ auth()->user()->budget }}</h4>
                <h4>Message: {{ auth()->user()->message }}</h4>
                <h4>Joined At: {{ auth()->user()->created_at->format("d M Y") }}</h4>

            @endif

            
        </div>
    </div>

    <x-slot name="footer">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>

            ;(function($){
                $(document).ready(function(){

                    

                    $("table button.wp").click(function(){
                        var data = {
                            "id" : $(this).data("id"),
                            "name" : $(this).data("name"),
                            "email" : $(this).data("email"),
                            "action" : "elegant-theme",
                        };

                        $.ajax({
                            type: 'POST',
                            url: 'http://elegantthemes.test/wp-admin/admin-ajax.php',
                            data: data,
                            dataType: 'json',
                            success: function(data) {
                                alert(data.data);
                            },
                            error: function(e) {
                                alert(e);
                            }
                        });
                    });
                });
            })(jQuery)

        </script>
    </x-slot>
</x-app-layout>