<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SignInPage;
use Tests\DuskTestCase;

class SignInTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can sign in
     *
     * @return void
     */
    public function a_user_can_sign_in()
    {
        $user = factory(User::class)->create([
            'email' => 'alex@codecourse.com',
            'password' => bcrypt('password'),
            'name' => 'Alex Garrett'
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit(new SignInPage)
                ->signIn($user->email, 'password')
                ->assertPathIs('/home')
                ->assertSeeIn('.navbar', $user->name);
        });
    }
}
