<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestResponse;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LoginTest extends TestCase
{
    use DatabaseTransactions;

    public function testLoginAValidUser()
    {
        $user = factory(App\User::class)->create();

        $response = $this->post('/login',[
            'email'=> $user->email,
            'password' => 'secret'
        ]);

        $response->assertStatus(302);

        $this->assertAuthenticatedAs($user);
    }

    public function testDoesNotLoginAnInvalidUser()
    {
        $user = factory(App\User::class)->create();

        $response = $this->post('/login',[
            'email'=>$user->email,
            'password' => 'invalid'
        ]);

        $response->assertSessionHasErrors();
        
        $this->assertGuest();
    }

    public function testLogoutAnAuthenticatedUser()
    {
        $user = factory(App\User::class)->create();

        $response = $this->actingAs($user)->post('/logout');

        $response->assertStatus(302);

        $this->assertGuest();
    }
}