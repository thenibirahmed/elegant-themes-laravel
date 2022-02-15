<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller {

    /**
     * Show a user
     *
     * @param User $user
     * @return view
     */
    public function show( User $user ) {
        return view( "user", [
            "user" => $user,
        ] );
    }
}
