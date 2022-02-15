<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class AjaxTest extends TestCase {
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_login_via_ajax() {
        

        $this->withoutExceptionHandling();

        // $response = $this->post("http://elegantthemes.test/wp-admin/admin-post.php",[
        //     "name"   => "Nibir",
        //     "email"  => uniqid() . "@gmail.com",
        //     "id"     => rand( 0, 500 ),
        //     "action" => "elegant-theme"
        // ]);

        $this->withoutExceptionHandling();

        $response = Http::asForm()->post("http://elegantthemes.test/wp-admin/admin-post.php",[
                "name"   => $this->faker->name,
                "email"  => $this->faker->email,
                "id"     => rand( 0, 500 ),
                "action" => "elegant-theme"
        ]);

        $this->assertEquals( 200, $response->status() );

    }
}
