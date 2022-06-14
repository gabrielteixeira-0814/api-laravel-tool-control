<?php 

namespace App\Services;
use App\Repositories\SectorRepositoryInterface;
use Validator;


class SectorService
{
    private $repo;

    public function __construct(SectorRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {

        $mensagens = [
            'sector.required' => 'O nome do setor é obrigatório!',
            'sector.min' => 'É necessário no mínimo 5 caracteres no nome do setor!',
            'sector.max' => 'É necessário no Máximo 255 caracteres no nome do setor!',

            'codeSector.required' => 'O código do setor é obrigatório!',
            'codeSector.min' => 'É necessário no mínimo 5 caracteres no código do setor!',
            'codeSector.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'sector' => 'required|string|min:5|max:255',
            'codeSector' => 'required|string|min:5|max:100',
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
            'sector.required' => 'O nome do setor é obrigatório!',
            'sector.min' => 'É necessário no mínimo 5 caracteres no nome do setor!',
            'sector.max' => 'É necessário no Máximo 255 caracteres no nome do setor!',

            'codeSector.required' => 'O código do setor é obrigatório!',
            'codeSector.min' => 'É necessário no mínimo 5 caracteres no código do setor!',
            'codeSector.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'sector' => 'required|string|min:5|max:255',
            'codeSector' => 'required|string|min:5|max:100',
        ], $mensagens);

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}




?>