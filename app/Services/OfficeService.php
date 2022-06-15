<?php 

namespace App\Services;
use App\Repositories\OfficeRepositoryInterface;
use Validator;


class OfficeService
{
    private $repo;

    public function __construct(OfficeRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'office.required' => 'O nome do cargo é obrigatório!',
            'office.min' => 'É necessário no mínimo 5 caracteres no nome do cargo!',
            'office.max' => 'É necessário no Máximo 255 caracteres no nome do cargo!',

            'codeOffice.required' => 'O código do cargo é obrigatório!',
            'codeOffice.min' => 'É necessário no mínimo 5 caracteres no código do cargo!',
            'codeOffice.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'office' => 'required|string|min:5|max:255',
            'codeOffice' => 'required|string|min:5|max:100',
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
            'office.required' => 'O nome do cargo é obrigatório!',
            'office.min' => 'É necessário no mínimo 5 caracteres no nome do cargo!',
            'office.max' => 'É necessário no Máximo 255 caracteres no nome do cargo!',

            'codeOffice.required' => 'O código do cargo é obrigatório!',
            'codeOffice.min' => 'É necessário no mínimo 5 caracteres no código do cargo!',
            'codeOffice.max' => 'É necessário no Máximo 100 caracteres no código!',
        ];

        $data = $request->validate([
            'office' => 'required|string|min:5|max:255',
            'codeOffice' => 'required|string|min:5|max:100',
        ], $mensagens);

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}




?>