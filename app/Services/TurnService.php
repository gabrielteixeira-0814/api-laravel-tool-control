<?php 

namespace App\Services;
use App\Repositories\TurnRepositoryInterface;
use Validator;


class TurnService
{
    private $repo;

    public function __construct(TurnRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store(array $data)
    {
        // $mensagens = [
        //     'turn.required' => 'O nome do turno é obrigatório!',
        //     'turn.min' => 'É necessário no mínimo 5 caracteres no nome do turno!',
        //     'turn.max' => 'É necessário no Máximo 255 caracteres no nome do turno!',

        //     'codeTurn.required' => 'O código do turno é obrigatório!',
        //     'codeTurn.max' => 'É necessário no Máximo 100 caracteres no código!',
        // ];

        // $validatedData = Validator::make($data, [
        //     'turn' => 'required|string|min:5|max:255',
        //     'codeTurn' => 'required|string|max:100',
        // ], $mensagens);

        $data['status'] = 0;

        return $this->repo->store($data);
    }

    public function getList()
    {
        return $this->repo->getList();
    }

    public function get($id)
    {
        return $this->repo->get($id);
    }

    public function update(array $data, $id)
    {
        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}




?>