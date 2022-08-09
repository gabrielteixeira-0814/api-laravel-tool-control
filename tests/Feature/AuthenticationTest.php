<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Testing\Fluent\AssertableJson;

use Tests\TestCase;

use App\Models\User;
use App\Models\Turn;
use App\Models\Office;
use App\Models\Sector;

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
    

     /* Teste que retornar as mensagem de erros quando o usuario nao passa os valores corretos para os campos */
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


    /* Teste onde precisa repetir a senha novamente e é passado uma senha diferente da confirmação */
    public function test_Repeat_password()
    {
        $userData = [
            "name" => "John Doe",
            "email" => "doe@example.com",
            "password" => "demo12345",
            "password_confirmation" => "demo123",
            "cpf" => "00000000101",
            "matricula" => "00000100",
            "turn_id" => "1",
            "office_id" => "1",
            "sector_id" => "1",
        ];

        $this->json('post', 'api/register', $userData)
            ->assertStatus(422)
            ->assertJson([
                "message" => "The password confirmation does not match.",
                "errors" => [
                    "password" => ["The password confirmation does not match."]
                ]
            ]);
    }

    /* Testa a criação de um registro de usuário */
    public function test_successful_registration()
    {
        $turnId = Turn::create(
            [
                'turn' => 'primeiro',
                'codeTurn' => '0010000',
                'status' => 0
            ]
        );

        $officeId = Office::create(
            [
                'office' => 'Analista',
                'codeOffice' => '0010000',
                'status' => 0
            ]
        );

        $sectorId = Sector::create(
            [
                'sector' => 'Logistica',
                'codeSector' => '0010000',
                'status' => 0
            ]
        );

        // $user = User::create(
        //    [
        //         "name" => "John Doe",
        //         "email" => "doe@example.com",
        //         "password" => "demo12345",
        //         "password_confirmation" => "demo12345",
        //         "cpf" => "00000000101",
        //         "matricula" => "00000100",
        //         "turn_id" => $turnId->id,
        //         "office_id" => $officeId->id,
        //         "sector_id" => $sectorId->id,
        //     ]
        // );


        $userData =
            [
                "name" => "John Doe",
                "email" => "doe@example.com",
                "password" => "demo12345",
                "password_confirmation" => "demo12345",
                "cpf" => "00000000101",
                "matricula" => "00000100",
                "turn_id" => $turnId->id,
                "office_id" => $officeId->id,
                "sector_id" => $sectorId->id,
             ];
        
        // dd($userData);

        $this->json('post', 'api/register', $userData)
            ->assertStatus(201)
            ->assertJsonStructure([
                "user" => [
                    'id',
                    'name',
                    'email',
                    'matricula',
                    'turn_id',
                    'office_id',
                    'sector_id',
                    'created_at',
                    'updated_at',
                ],
                "token"
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
