<?php

class PerfilUsuario
{
    public $nome;
    public $email;
    public $endereco;
    public $telefone;
    public $dataNascimento;
    public $fotoPerfil;
    public $redesSociais = [];
    public $preferencias = [];

    public function __construct(
        $nome,
        $email,
        $endereco = null,
        $telefone = null,
        $dataNascimento = null,
        $fotoPerfil = null,
        $redesSociais = [],
        $preferencias = []
    ) {
        $this->nome = $nome;
        $this->email = $email;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->dataNascimento = $dataNascimento;
        $this->fotoPerfil = $fotoPerfil;
        $this->redesSociais = $redesSociais;
        $this->preferencias = $preferencias;
    }

    public function __toString()
    {
        return "Perfil de {$this->nome} com email {$this->email}";
    }
}

// Exemplo de uso sem o Builder
$perfil = new PerfilUsuario(
    "João",
    "joao@example.com",
    "Rua A, 123",
    "12345-6789",
    "2000-01-01",
    "foto.png",
    ["LinkedIn" => "linkedin.com/joao"],
    ["tema" => "escuro", "notificacoes" => "email"]
);

echo $perfil;
