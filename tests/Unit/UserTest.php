<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /** @test */
    public function check_if_user_columns_is_correct()
    {
        $user = new User;

        $expected = [
            'name',
            'email',
            'password',
            'cpf',
            'matricula',
            'image',
            'turn_id',
            'office_id',
            'sector_id'
        ];

        // array_diff -> Ele compara o array com o model  e o getFillable() trás o model preenchido
        $arrayCompared = array_diff($expected, $user->getFillable());

       //dd($arrayCompared);

        // Teste de comparação de quantidade de array que estiver errado entre $expected e $user
        // A comparação entre os dois tem que ser 0 ou seja um array vazio ex: []
        $this->assertEquals(0, count($arrayCompared));
    }
}
