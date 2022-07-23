<?php
    
namespace Tests\Controllers;
    
use Illuminate\Http\Response;
use Tests\TestCase;
    
class TurnControllerTests extends TestCase {
    
    public function testIndexReturnsDataInValidFormat() {
    
    $this->json('get', 'api/turn')
         ->assertStatus(Response::HTTP_OK)
         ->assertJsonStructure(
             [
                 'data' => [
                     '*' => [
                         'id',
                         'turn',
                         'codeTurn',
                         'status',
                         'created_at',
                     ]
                 ]
             ]
         );
  }
}