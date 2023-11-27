<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\Browser\Pages\SignUpPage;
use Tests\DuskTestCase;

class SignUpTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * @test A user can sign up
     *
     * @return void
     */
    public function a_user_can_sign_up()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new SignUpPage)
                ->signUp('Tabby Garrett', 'tabby@codecourse.com', 'password', 'password')
                ->assertPathIs('/home')
                ->assertSeeIn('.navbar', 'Tabby Garrett');
        });
    }
}
