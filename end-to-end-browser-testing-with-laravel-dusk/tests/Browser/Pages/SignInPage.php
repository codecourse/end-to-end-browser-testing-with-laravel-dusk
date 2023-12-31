<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class SignInPage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/login';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertPathIs('/login');
    }

    public function signIn(Browser $browser, $email = null, $password = null)
    {
        $browser->type('@email', $email)
            ->type('@password', $password)
            ->press('Login');
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@email' => 'input[name="email"]',
            '@password' => 'input[name="password"]',
        ];
    }
}
