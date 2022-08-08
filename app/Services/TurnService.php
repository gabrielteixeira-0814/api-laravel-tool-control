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

    public function store($request)
    {
        $mensagens = [
            'turn.required' => 'O nome do turno é obrigatório!',
            'turn.min' => 'É necessário no mínimo 5 caracteres no nome do turno!',
            'turn.max' => 'É necessário no Máximo 255 caracteres no nome do turno!',

            'codeTurn.required' => 'O código do turno é obrigatório!',
            'codeTurn.min' => 'É necessário no mínimo 5 caracteres no código do turno!',
            'codeTurn.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'turn' => 'required|string|min:5|max:255',
            'codeTurn' => 'required|string|min:5|max:100',
        ], $mensagens);

        $data['status'] = 0;

        // Criado para usar no teste
       /*** $data = $request->validate([
            'turn' => '',
            'codeTurn' => '',
        ], $mensagens);

        if($this->repo->store($data) == "Error") {
            return response()->json([
                'message'   => 'Não foi possível criar o turno, verifique se todos os dados fora inserido corretamente!',
            ], 500);
        } ***/


        return $this->repo->store($data);
    }

    public function getList()
    {
        return $this->repo->getList();
    }

    public function get($id)
    {
        $data = $this->repo->get($id);
        if(!$data) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        return $this->repo->get($id);
    }

    public function update($request, $id)
    {
        $mensagens = [
            'turn.required' => 'O nome do turno é obrigatório!',
            'turn.min' => 'É necessário no mínimo 5 caracteres no nome do turno!',
            'turn.max' => 'É necessário no Máximo 255 caracteres no nome do turno!',

            'codeTurn.required' => 'O código do turno é obrigatório!',
            'codeTurn.min' => 'É necessário no mínimo 5 caracteres no nome do turno!',
            'codeTurn.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'turn' => 'required|string|min:5|max:255',
            'codeTurn' => 'required|string|min:5|max:100',
        ], $mensagens);

        $dataUpdate = $this->repo->get($id);

        if(!$dataUpdate) {
            return response()->json([
                'message'   => 'Record not found for update',
            ], 404);
        }

        if($this->repo->update($data, $id)){
            return $dataUpdate;
        }
    }

    public function destroy($id)
    {

        $dataDelete = $this->repo->get($id);

        if(!$dataDelete){
            return response()->json([
                'message' => 'Record not found for delete',
            ], 404);
        }
        
        if($this->repo->destroy($id)){
            return $dataDelete;
        }
    }
}




?>