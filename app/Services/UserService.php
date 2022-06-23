<?php 

namespace App\Services;
use App\Repositories\UserRepositoryInterface;
use Validator;


class UserService
{
    private $repo;

    public function __construct(UserRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function store($request)
    {
        $mensagens = [
            'name.required' => 'O nome do usuário é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do usuário!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do usuário!',

            'email.required' => 'O email do usuário é obrigatório!',
            'email.email' => 'O e-mail é inválido',
            'email.unique' => 'O e-mail já existe',
           
            'password.required' => 'O nome do usuário é obrigatório!',
            'password.min' => 'É necessário no mínimo 5 caracteres na senha usuário!',
            'password.max' => 'É necessário no Máximo 10 caracteres na senha do usuário!',
            'password.confirmed' => 'É necessário confirmar a senha!',

            'cpf.required' => 'O cpf do usuário é obrigatório!',
            'cpf.min' => 'É necessário no mínimo 5 caracteres no cpf do usuário!',
            'cpf.max' => 'É necessário no Máximo 15 caracteres no cpf do usuário!',

            'turn_id.required' => 'O id do turn é obrigatório!',

            'office_id.required' => 'O id do cargo é obrigatório!',

            'sector_id.required' => 'O id do setor é obrigatório!',

            'matricula.required' => 'A matricula do usuário é obrigatório!',
            'matricula.min' => 'É necessário no mínimo 5 caracteres na matricula do usuário!',
            'matricula.max' => 'É necessário no Máximo 25 caracteres na matricula do usuário!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5|max:10|confirmed',
            'password_confirmation' => 'required|string|min:5|max:10',
            'cpf' => 'required|string|min:5|max:15',
            'matricula' => 'required|string|min:5|max:25',
            'turn_id' => 'required',
            'office_id' => 'required',
            'sector_id' => 'required',
        ], $mensagens);

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
            'name.required' => 'O nome do usuário é obrigatório!',
            'name.min' => 'É necessário no mínimo 5 caracteres no nome do usuário!',
            'name.max' => 'É necessário no Máximo 255 caracteres no nome do usuário!',

            'email.required' => 'O email do usuário é obrigatório!',
            'email.email' => 'O e-mail é inválido',
            'email.unique' => 'O e-mail já existe',
           
            'password.required' => 'O nome do usuário é obrigatório!',
            'password.min' => 'É necessário no mínimo 5 caracteres na senha usuário!',
            'password.max' => 'É necessário no Máximo 10 caracteres na senha do usuário!',
            'password.confirmed' => 'É necessário confirmar a senha!',

            'cpf.required' => 'O cpf do usuário é obrigatório!',
            'cpf.min' => 'É necessário no mínimo 5 caracteres no cpf do usuário!',
            'cpf.max' => 'É necessário no Máximo 15 caracteres no cpf do usuário!',

            'turn_id.required' => 'O id do turn é obrigatório!',

            'office_id.required' => 'O id do cargo é obrigatório!',

            'sector_id.required' => 'O id do setor é obrigatório!',

            'matricula.required' => 'A matricula do usuário é obrigatório!',
            'matricula.min' => 'É necessário no mínimo 5 caracteres na matricula do usuário!',
            'matricula.max' => 'É necessário no Máximo 25 caracteres na matricula do usuário!',
        ];

        $data = $request->validate([
            'name' => 'required|string|min:5|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:10|confirmed',
            'password_confirmation' => 'min:5|max:10',
            'cpf' => 'required|string|min:5|max:15',
            'matricula' => 'required|string|min:5|max:25',
            'turn_id' => 'required',
            'office_id' => 'required',
            'sector_id' => 'required',
        ], $mensagens);

        return $this->repo->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->repo->destroy($id);
    }
}




?>