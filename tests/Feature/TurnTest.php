<?php

namespace Tests\Feature;

//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithFaker;

use Illuminate\Http\Response;
use Tests\TestCase;
use App\Models\Turn;

class TurnTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     // Rertona uma lista de turnos, com json com status (200).
     // Compara o retorno do json é igual o passado.
    public function test_returns_user_list() 
    {
    
        $this->json('get', 'api/turns')
             ->assertStatus(200)
             ->assertJsonStructure(
                 [
                    '*' => [
                        'id',
                        'turn',
                        'codeTurn',
                        'status'
                    ]
                 ]
             );
      }


    // Criar um turno e retorna um status (201).
    // Criar um turno e compara com a estrutura correta.
    // Verifica e garantir que o turno exista no banco de dados.
    public function test_create_user()
    {
        $turn = [
            'turn' => 'primeiro',
            'codeTurn' => '564561561'
            //'status' => $this->faker->email
        ];

       // dd($turn);

        $this->json('post', 'api/turns', $turn)
             ->assertStatus(201)
             ->assertJsonStructure(
                 [
                    'id',
                    'turn',
                    'codeTurn',
                    'status',
                    'created_at',
                    'updated_at'
                 ]
             );

        $this->assertDatabaseHas('turns', $turn);
    }



    // public function testUserIsShownCorrectly pare aqui .....................


    // Criar um turno e retorna um resposta com status(200)
    // Busca um turno e pelo id criado com o turno e compara ser a resposta passada e igual 
    public function testUserIsShownCorrectly() {

        $turn = Turn::create(
            [
                "turn" => "teste",
                "codeTurn" => "564561561",
                "status" => 0
            ]
        );
       
        $this->json('get', "api/turns/$turn->id")
            ->assertStatus(200)
            ->assertExactJson(
                [
                    "codeTurn" => "564561561",
                    "status" => 0,
                    "id" => 1,
                    "turn"=> "teste",
                ]
            );
    }


}
