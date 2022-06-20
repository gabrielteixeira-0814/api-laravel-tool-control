<?php 

namespace App\Services;
use App\Repositories\ModelsRepositoryInterface;
use Validator;


class ModelsService
{
    private $repo;

    public function __construct(ModelsRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'name.required' => 'O nome do modelo é obrigatório!',
            'name.min' => 'É necessário no mínimo 2 caracteres no nome do modelo!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome da marca!',

            'codeModel.required' => 'O código do modelo é obrigatório!',
            'codeModel.min' => 'É necessário no mínimo 5 caracteres no código do modelo!',
            'codeModel.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'codeModel' => 'required|string|min:5|max:100',
        ], $mensagens);

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

    public function update($request, $id)
    {
        $mensagens = [
            'name.required' => 'O nome do modelo é obrigatório!',
            'name.min' => 'É necessário no mínimo 2 caracteres no nome do modelo!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome da marca!',

            'codeModel.required' => 'O código do modelo é obrigatório!',
            'codeModel.min' => 'É necessário no mínimo 5 caracteres no código do modelo!',
            'codeModel.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'codeModel' => 'required|string|min:5|max:100',
        ], $mensagens);

        $data['status'] = 0;
        
        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}




?>