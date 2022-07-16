<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */

    public function only_logged_in_users_can_see_users_list()
    {
        //$response = $this->get('api/user/')->assertRedirect('api/login');
    }
}
