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


    /* Teste obrigatórios para inserir os registros do turno */
    public function test_required_fields_for_registration()
    {
        $this->json('post', 'api/turns')
            ->assertStatus(422)
            ->assertJson([
                "message" => "O nome do turno é obrigatório! (and 1 more error)",
                "errors" => [
                    "turn" => ["O nome do turno é obrigatório!"],
                    "codeTurn" => ["O código do turno é obrigatório!"],
                ]
            ]);
    }


     // Rertona uma lista de turnos, com json com status (200).
     // Compara o retorno do json é igual o passado.
    public function test_returns_user_list()  // list
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
    public function test_create_user() // create
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
    public function test_confirm_the_return_of_shift_details() { // show

        $turn = Turn::create(
            [
                "turn" => "teste1",
                "codeTurn" => "564561561",
                "status" => 0
            ]
        );
       
        $this->json('get', "api/turns/$turn->id")
            ->assertStatus(200)
            ->assertJson(
                [
                    "turn" => "teste1",
                    "codeTurn" => "564561561",
                    "status" => 0,
                ]
            );
    }


    // Criar um turno
    // Faz uma requisição delete passando i id do turno criado e retorna um resposta com status(200)
    // Verifica se o turno esta ausente no banco de dados depois de deletar
    public function test_turn_is_destroyed() {


        $turnData = [
                        "turn" => "teste1",
                        "codeTurn" => "564561561",
                        "status" => 0,
                    ];

        $turn = Turn::create($turnData);
        
        $this->json('delete', "api/turns/$turn->id")
             ->assertStatus(200);
        $this->assertDatabaseMissing('turns', $turnData);
    }


    /*  
        Criar um turno
        Criar um turno para edição
        Faz uma requisição editando passando o id do turno e os dados a ser editados, e
        criando retorna uma resposta com status(200)
        Verifica se os dados retornados sao iguais aos editados
    */

    public function test_update_user_returns_correct_data() {

        // Atual
        $turn = Turn::create(
            [
                "turn" => "teste1",
                "codeTurn" => "564561561",
                "status" => 0,
            ]
        );

        // Novos dados
        $turnUpdate = [
            "turn" => "teste2",
            "codeTurn" => "00000",
            "status" => 1,
        ];


        $this->json('post', "api/turns/$turn->id", $turnUpdate)
        ->assertStatus(200)
        ->assertJson(
            [
                'id'         => $turn->id,
                'turn'       => $turnUpdate['turn'],
                'codeTurn'   => $turnUpdate['codeTurn'],
                'status'     => 0,
            ]
        );
    }



    /********************* Teste com retornos com erros *********************/

     /*  
       Faz uma requisição de proucurar por um turno e retorna um erro 404 com uma mensagem  de error.
    */
    public function test_when_turn_does_not_exist() {

        $this->json('get', "api/turns/0")
        ->assertStatus(404)
        ->assertJson(['message' => 'Record not found']);
    }

    /*
        Faz uma requesicao de create mas retorna um erro 400 que não foi registrado os dados
        com uma mensagem de error.
    */
    public function test_store_with_missing_data() {
    
        $turn = [
            "turn" => "teste2",
            "codeTurn" => "",
            "status" => 0,
        ];

        $this->json('post', 'api/turns', $turn)
             ->assertStatus(500)
             ->assertJson(['message' => 'Não foi possível criar o turno, verifique se todos os dados fora inserido corretamente!']);
    }

    /*
        Faz uma requesicao de update mas retorna um erro 404 que não foi encontrado registro
        selecionado para edicão com uma mensagem de error.
    */
    public function test_when_turn_does_not_exist_for_update() {

        $turnUpdate = [
            "turn" => "teste2",
            "codeTurn" => "00000",
            "status" => 1,
        ];

        $this->json('post', 'api/turns/0', $turnUpdate)
         ->assertStatus(404)
         ->assertJson(['message' => 'Record not found for update']);
    }

    /*
        Faz uma requisição delete mas retorna status 404 onde não foi encontrado o registro 
        selecionado para excluir, e retornar uma mensagem de error
    */
    public function test_destroy_for_missing_turn() {
    
        $this->json('delete', 'api/turns/0')
             ->assertStatus(404)
             ->assertJson(['message' => 'Record not found for delete']);
    }
}
