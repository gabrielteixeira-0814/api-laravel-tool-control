<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use App\User;
use Tests\TestCase;


class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRequiredFieldsForRegistration()
    {
        $this->json('POST', 'api/register', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The given data was invalid.",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                    "cpf" => ["The cpf field is required."],
                    "image" => ["The image field is required."],
                    "matricula" => ["The matricula field is required."],
                    "turn_id" => ["The turn_id field is required."],
                    "office_id" => ["The office_id field is required."],
                    "sector_id" => ["The sector_id field is required."],
                ]
            ]);
    }
}
