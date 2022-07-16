<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    /** @test */
    public function ckeck_if_root_site_is_correct()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }
}
