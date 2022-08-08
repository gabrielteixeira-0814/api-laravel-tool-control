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
    

    public function test_Required_Fields_For_Registration_users()
    {
        $this->json('post', 'api/register',)
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
                    "sector_id" => ["The sector id field is required."]
                ]
            ]);
    }


     /***  Verificar se o status é 200 quando  traz uma lista de usuários.  ***/ 
     /***  Verificar se a estrutura da resposta em json é a correta. ***/ 
    public function test_returns_a_list_of_users() {
    
        $this->json('get', 'api/user/')
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
                        'office_i',
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
            
        $this->json('post', 'api/register', $user)
            ->assertStatus(201)
            ->assertJson(
                [
                    "user" => [
                        "name" => "John Doeaaa", 
                        "email" => "doe@example.com",
                        "password" => "demo12345",
                        "password_confirmation" => "demo12345",
                        "cpf" => "12345657357",
                        "matricula" => "1234564387387",
                        "turn_id" => 1,
                        "office_id" => 1,
                        "sector_id" => 1,
                    ],
                    "token" => ""
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


}
