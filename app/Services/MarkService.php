<?php 

namespace App\Services;
use App\Repositories\MarkRepositoryInterface;
use Validator;


class MarkService
{
    private $repo;

    public function __construct(MarkRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'name.required' => 'O nome da marca é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome da marca!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome da marca!',

            'codeMark.required' => 'O código da marca é obrigatório!',
            'codeMark.min' => 'É necessário no mínimo 5 caracteres no código da marca!',
            'codeMark.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'codeMark' => 'required|string|min:5|max:100',
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
            'name.required' => 'O nome da marca é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome da marca!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome da marca!',

            'codeMark.required' => 'O código da marca é obrigatório!',
            'codeMark.min' => 'É necessário no mínimo 5 caracteres no código da marca!',
            'codeMark.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'codeMark' => 'required|string|min:5|max:100',
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