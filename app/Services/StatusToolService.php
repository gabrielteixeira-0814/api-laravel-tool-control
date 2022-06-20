<?php 

namespace App\Services;
use App\Repositories\StatusToolRepositoryInterface;
use Validator;


class StatusToolService
{
    private $repo;

    public function __construct(StatusToolRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'toolStatus.required' => 'O status da ferramenta é obrigatório!',
            'toolStatus.min' => 'É necessário no mínimo 5 caracteres no status da ferramenta!',
            'toolStatus.max' => 'É necessário no Máximo 255 caracteres no status da ferramenta!',
        ];

        $data = $request->validate([
            'toolStatus' => 'required|string|min:5|max:255',
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
            'toolStatus.required' => 'O status da ferramenta é obrigatório!',
            'toolStatus.min' => 'É necessário no mínimo 5 caracteres no status da ferramenta!',
            'toolStatus.max' => 'É necessário no Máximo 255 caracteres no status da ferramenta!',
        ];

        $data = $request->validate([
            'toolStatus' => 'required|string|min:5|max:255',
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