<?php 

namespace App\Services;
use App\Repositories\ToolRepositoryInterface;
use Validator;


class ToolService
{
    private $repo;

    public function __construct(ToolRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {

        $mensagens = [
            'name.required' => 'O nome da ferramenta é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome da ferramenta!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome da ferramenta!',

            'codeTool.required' => 'O código da ferramenta é obrigatório!',
            'codeTool.min' => 'É necessário no mínimo 5 caracteres no código da ferramenta!',
            'codeTool.max' => 'É necessário no Máximo 15 caracteres no código da ferramenta!',
           
            'mark_id.required' => 'O id da marca é obrigatório!',

            'model_id.required' => 'O id do modelo é obrigatório!',

            'statustool_id.required' => 'O id do status da ferramenta é obrigatório!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'codeTool' => 'required|string|min:5|max:15',
            'image' => 'image',
            'mark_id' => 'required',
            'model_id' => 'required',
            'statustool_id' => 'required',
        ], $mensagens);

        // Upload de imagem
        $file = $data['image'];

        if($file) {
            $nameFile = $file->getClientOriginalName();
            $file = $file->storeAs('tools', $nameFile);
            $data['image'] = $file;
        }

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
            'name.required' => 'O nome da ferramenta é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome da ferramenta!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome da ferramenta!',

            'codeTool.required' => 'O código da ferramenta é obrigatório!',
            'codeTool.min' => 'É necessário no mínimo 5 caracteres no código da ferramenta!',
            'codeTool.max' => 'É necessário no Máximo 15 caracteres no código da ferramenta!',
           
            'mark_id.required' => 'O id da marca é obrigatório!',

            'model_id.required' => 'O id do modelo é obrigatório!',

            'statustool_id.required' => 'O id do status da ferramenta é obrigatório!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'codeTool' => 'required|string|min:5|max:15',
            'mark_id' => 'required',
            'model_id' => 'required',
            'statustool_id' => 'required',
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