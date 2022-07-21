<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

     /**
      * @test
      */
    // public function shouldReturnCorrectCartTotal()
    // {
    //    // Arranjar
    //    $lista = [0,3,5];
    //    $soma = 0;


    //     // Agir
    //    foreach ($lista as $value) {
    //         $soma = $soma + $value;
    //    }

    //     // Afirmar
    //     $this->assertEquals(8, $soma);  // Compara o 8 com o total da variavel

    //     //$this->assertTrue(true);
    // }

    public function shouldReturnZeroWhenArrayEmpty()
    {
       // Arranjar
       $lista = [];
       $soma = 0;


        // Agir
       foreach ($lista as $value) {
            $soma = $soma + $value;
       }

        // Afirmar
        $test = $this->assertEquals(0, $soma);  // Compara o 8 com o total da variavel

        if($test == null){
            $test = false;
        }
        
        $this->assertFalse($test);
    }
}
