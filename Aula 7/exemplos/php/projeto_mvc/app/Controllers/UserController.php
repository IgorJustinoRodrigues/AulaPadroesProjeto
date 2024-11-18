<?php

namespace App\Controllers;

use App\Models\User;

class UserController
{
    public function index()
    {
        $users = User::all();
        require '../app/Views/users/index.php';
    }

    public function show($id)
    {
        $user = User::find($id);
        require '../app/Views/users/show.php';
    }

    public function create()
    {
        require '../app/Views/users/create.php';
    }

    public function store($data = [])
    {
        // Validação dos dados recebidos
        if (!isset($data['name']) || !isset($data['email'])) {
            die("Nome e email são obrigatórios para a criação de um usuário.");
        }

        // Insere o usuário no banco de dados
        User::create($data);

        // Redireciona para a lista de usuários
        header('Location: ?controller=UserController&action=index');
    }
    public function edit($id)
    {
        $user = User::find($id);
        require '../app/Views/users/edit.php';
    }

    public function update($id, $data = [])
    {
        // Validação dos dados recebidos
        if (!isset($data['name']) || !isset($data['email'])) {
            die("Nome e email são obrigatórios para a atualização.");
        }

        // Atualiza o usuário no banco de dados
        User::update($id, $data);

        // Redireciona para a lista de usuários
        header('Location: ?controller=UserController&action=index');
    }

    public function delete($id)
    {
        User::delete($id);
        header('Location: ?controller=UserController&action=index');
    }
}
