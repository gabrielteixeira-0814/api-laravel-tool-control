<?php 

namespace App\Services;
use App\Repositories\ToolRouteRepositoryInterface;
use Validator;


class ToolRouteService
{
    private $repo;

    public function __construct(ToolRouteRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'title.required' => 'O título é obrigatório!',
            'title.min' => 'É necessário no mínimo 5 caracteres no título!',
            'title.max' => 'É necessário no Máximo 255 caracteres no título!',

            'operationType.required' => 'O tipo da operacão é obrigatório!',
            'operationType.min' => 'É necessário no mínimo 5 caracteres no tipo da operação!',
            'operationType.max' => 'É necessário no Máximo 15 caracteres no tipo da operação!',

            'finalResult.required' => 'O tipo da operacão é obrigatório!',
           
            'user_id.required' => 'O id da marca é obrigatório!',

            'tool_id.required' => 'O id do modelo é obrigatório!',

        ];

        $data = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'operationType' => 'required|string|min:5|max:100',
            'finalResult' => 'required',
            'image' => 'image',
            'user_id' => 'required',
            'tool_id' => 'required',
        ], $mensagens);

        if(!$request['description']){
            $data['description'] = '';
        }

        // Upload de imagem
        $file = $data['image'];

        if($file) {
            $nameFile = $file->getClientOriginalName();
            $file = $file->storeAs('toolRoute', $nameFile);
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
            'title.required' => 'O título é obrigatório!',
            'title.min' => 'É necessário no mínimo 5 caracteres no título!',
            'title.max' => 'É necessário no Máximo 255 caracteres no título!',

            'operationType.required' => 'O tipo da operacão é obrigatório!',
            'operationType.min' => 'É necessário no mínimo 5 caracteres no tipo da operação!',
            'operationType.max' => 'É necessário no Máximo 15 caracteres no tipo da operação!',

            'finalResult.required' => 'O tipo da operacão é obrigatório!',
           
            'user_id.required' => 'O id da marca é obrigatório!',

            'tool_id.required' => 'O id do modelo é obrigatório!',

        ];

        $data = $request->validate([
            'title' => 'required|string|min:5|max:255',
            'operationType' => 'required|string|min:5|max:100',
            'finalResult' => 'required',
            'image' => 'image',
            'user_id' => 'required',
            'tool_id' => 'required',
        ], $mensagens);

        if(!$request['description']){
            $data['description'] = '';
        }


        // Upload de imagem
        $file = $data['image'];

        if($file) {
            $nameFile = $file->getClientOriginalName();
            $file = $file->storeAs('toolRoute', $nameFile);
            $data['image'] = $file;
        }

        $data['status'] = 0;

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}




?>