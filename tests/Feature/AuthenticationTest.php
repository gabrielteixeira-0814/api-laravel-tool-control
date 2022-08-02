<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

use App\Models\User;
use Tests\TestCase;


class AuthenticationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /**
     * @test
     * 
     */
    
     /***  Verificar se o status é 200 quando  traz uma lista de usuários.  ***/ 
     /***  Verificar se a estrutura da resposta em json é a correta. ***/ 
    public function test_returns_a_list_of_users() {
    
        $this->json('GET', 'api/user/')
             ->assertStatus(200)
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

    
      // Criar um usuário:
      // Testa se o returno do status é (201)
      // Testa se a estrutura do retorno do json é a correta
      /**
       * @
       */
    public function test_successful_create_user()
    {

        $user = [
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
            
        $this->json('POST', 'api/user', $user)
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                    'name',
                    'email',
                    'password',
                    'cpf',
                    'matricula',
                    'turn_id' => [
                        'id',
                    ],
                    'office_id' => [
                        'id',
                    ],
                    'sector_id' => [
                        'id',
                    ],
                    'created_at',
                    'updated_at',
                ]);
    }

     // Retorna um status de criação (2021)
     // Espera o retorno do json quando criar um usuário exatamente igual
     public function test_user_create_api_request()
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
 
         $response = $this->postJson('/api/user', $userData);
  
         $response
             ->assertStatus(201)
             ->assertJson([
                "name" => "John Doeaaa", 
                "email" => "doe@example.com",
                "password" => "demo12345",
                "password_confirmation" => "demo12345",
                "cpf" => "12345657357",
                "matricula" => "1234564387387",
                "turn_id" => 1,
                "office_id" => 1,
                "sector_id" => 1,
             ]);
     }









    // Espera o retorno do json quando criar um turno
    // public function test_making_an_api_request()
    // {

    //     $turnData = [
    //         "turn" => "primeiroasdsaa",
    //         "codeTurn" => "sadasd651"
    //     ];

    //     $response = $this->postJson('/api/turns', $turnData);
 
    //     $response
    //         ->assertStatus(201)
    //         ->assertJson([
    //             "turn" => "primeiroasdsaa",
    //             "codeTurn" => "sadasd651",
    //             "status" => 0,
    //         ]);
    // }



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


}
