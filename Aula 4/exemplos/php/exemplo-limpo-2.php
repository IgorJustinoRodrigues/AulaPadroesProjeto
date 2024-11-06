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

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setFotoPerfil($fotoPerfil)
    {
        $this->fotoPerfil = $fotoPerfil;
    }

    public function setRedesSociais(array $redesSociais)
    {
        $this->redesSociais = $redesSociais;
    }

    public function setPreferencias(array $preferencias)
    {
        $this->preferencias = $preferencias;
    }

    public function __toString()
    {
        return "Perfil de {$this->nome} com email {$this->email}";
    }
}

// Exemplo de uso sem encadeamento de métodos
$perfil = new PerfilUsuario();
$perfil->setNome("João");
$perfil->setEmail("joao@example.com");
$perfil->setEndereco("Rua A, 123");
$perfil->setTelefone("12345-6789");
$perfil->setDataNascimento("2000-01-01");
$perfil->setFotoPerfil("foto.png");
$perfil->setRedesSociais(["LinkedIn" => "linkedin.com/joao"]);
$perfil->setPreferencias(["tema" => "escuro", "notificacoes" => "email"]);

echo $perfil;
