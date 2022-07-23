<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\Turn;
//use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class TurnTest extends TestCase
{


    /**
     * A basic unit test example.
     *
     * @return void
     */

     /**
      * @test
      */
    public function crudCreateTurn()
    {

       

       
        $lista = [
            'turn' => 'Primeiro',
            'codeTurn'  => '254651',
            'status'      => 1
        ];

        dd($lista);
        $this->assertTrue(true);
    }

    public function turnIsCreatedSuccessfully() {
    
        $payload = [
            'turn' => $this->faker->firstName,
            'codeTurn'  => $this->faker->lastName,
            'status'      => $this->faker->email
        ];
        $lista = [0,3,5];

        dd($lista);

        $this->json('post', 'api/turn', $payload)
             ->assertStatus(Response::HTTP_CREATED)
             ->assertJsonStructure(
                 [
                     'data' => [
                        'id',
                        'turn',
                        'codeTurn',
                        'status',
                        'created_at',
                     ]
                 ]
             );
        $this->assertDatabaseHas('turns', $payload);
    }
}
