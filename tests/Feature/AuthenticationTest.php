<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

use App\User;
use Tests\TestCase;


class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    
    
    public function testIndexReturnsDataInValidFormat() {
    
        $this->json('GET', 'api/user/')
             ->assertStatus(Response::HTTP_OK)
             ->assertJsonStructure(
                 [
                    
                         '*' => [
                             'id',
                             'name',
                             'email',
                             'cpf',
                             'email_verified_at',
                             'matricula',
                             'turn_id',
                             'office_id',
                             'sector_id',
                             'created_at',
                             'updated_at',
                         ]
                     
                 ]
             );
      }
    
    
     public function testRequiredFieldsForRegistration()
    {
        $this->json('POST', 'api/register', ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The name field is required. (and 8 more errors)",
                "errors" => [
                    "name" => ["The name field is required."],
                    "email" => ["The email field is required."],
                    "password" => ["The password field is required."],
                    "password_confirmation" => ["The password confirmation field is required."],
                    "cpf" => ["The cpf field is required."],
                    "matricula" => ["The matricula field is required."],
                    "turn_id" => ["The turn id field is required."],
                    "office_id" => ["The office id field is required."],
                    "sector_id" => ["The sector id field is required."],
                ]
            ]);
    }


    public function testRepeatPassword()
    {
        $userData = [
            "name" => "John Doe",
            "email" => "doe@example.com",
            "password" => "demo12345",
            'cpf' => '23132151525',
            'matricula' => '655616515151',
            'turn_id' => 1,
            'office_id' => 1,
            'sector_id' => 1,
        ];

        $this->json('POST', 'api/register', $userData, ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJson([
                "message" => "The password confirmation does not match. (and 1 more error)",
                "errors" => [
                    "password" => ["The password confirmation does not match."],
                    "password_confirmation" => ["The password confirmation field is required."]
                ]
            ]);
    }


    public function testSuccessfulRegistration()
    {
        $userData = [
            "name" => "John Doeaaa",
            "email" => "doe@example.com",
            "password" => "demo12345",
            "password_confirmation" => "demo12345",
            "cpf" => "12345657357",
            "matricula" => "1234564387387",
            "turn_id" => 1,
            "office_id" => 1,
            "sector_id" => 1,
    ];
            

        //dd($userData);

        $this->json('POST', 'api/user', $userData)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure(
                [
                    'user' => [
                        'name',
                        'email',
                        'password',
                        'cpf',
                        'matricula',
                        'turn_id',
                        'office_id',
                        'sector_id',
                        'created_at',
                        'updated_at',
                    ]
                    //,
                    // "access_token",
                    // "message"
                ]);
    }

    
    // public function testSuccessfulRegistrationTurn()
    // {
    //     $turnData = [
    //         "turn" => "primeiroasdsaa",
    //         "codeTurn" => "sadasd651"
    // ];
            

    //     //dd($turnData);

    //     $this->json('POST', 'api/turns', $turnData)
    //         ->assertStatus(Response::HTTP_CREATED)
    //         ->assertJsonStructure(
    //             [
    //                 'turn',
    //                 'codeTurn',
    //                 'status',
    //                 'created_at',
    //                 'updated_at',
    //             ]);
    // }



    // Espera o retorno do json quando criar um turno
    public function test_making_an_api_request()
    {

        $turnData = [
            "turn" => "primeiroasdsaa",
            "codeTurn" => "sadasd651"
        ];

        $response = $this->postJson('/api/turns', $turnData);
 
        $response
            ->assertStatus(201)
            ->assertJson([
                "turn" => "primeiroasdsaa",
                "codeTurn" => "sadasd651",
                "status" => 0,
            ]);
    }

}
