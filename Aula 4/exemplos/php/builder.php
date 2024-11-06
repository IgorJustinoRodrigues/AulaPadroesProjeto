<?php
interface PerfilUsuarioBuilderInterface
{
    public function setNome($nome);
    public function setEmail($email);
    public function setEndereco($endereco);
    public function setTelefone($telefone);
    public function setDataNascimento($dataNascimento);
    public function setFotoPerfil($fotoPerfil);
    public function setRedesSociais(array $redesSociais);
    public function setPreferencias(array $preferencias);
    public function getPerfil();
}

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

    public function __toString()
    {
        return "Perfil de {$this->nome} com email {$this->email}";
    }
}

class PerfilUsuarioBuilder implements PerfilUsuarioBuilderInterface
{
    private $perfil;

    public function __construct()
    {
        $this->perfil = new PerfilUsuario();
    }

    public function setNome($nome)
    {
        $this->perfil->nome = $nome;
        return $this;
    }

    public function setEmail($email)
    {
        $this->perfil->email = $email;
        return $this;
    }

    public function setEndereco($endereco)
    {
        $this->perfil->endereco = $endereco;
        return $this;
    }

    public function setTelefone($telefone)
    {
        $this->perfil->telefone = $telefone;
        return $this;
    }

    public function setDataNascimento($dataNascimento)
    {
        $this->perfil->dataNascimento = $dataNascimento;
        return $this;
    }

    public function setFotoPerfil($fotoPerfil)
    {
        $this->perfil->fotoPerfil = $fotoPerfil;
        return $this;
    }

    public function setRedesSociais(array $redesSociais)
    {
        $this->perfil->redesSociais = $redesSociais;
        return $this;
    }

    public function setPreferencias(array $preferencias)
    {
        $this->perfil->preferencias = $preferencias;
        return $this;
    }

    public function getPerfil()
    {
        return $this->perfil;
    }
}

// Exemplo de uso com o PerfilUsuarioBuilder
$builder = new PerfilUsuarioBuilder();
$perfil = $builder->setNome("João")
    ->setEmail("joao@example.com")
    ->setEndereco("Rua A, 123")
    ->setTelefone("12345-6789")
    ->setDataNascimento("2000-01-01")
    ->setFotoPerfil("foto.png")
    ->setRedesSociais(["LinkedIn" => "linkedin.com/joao"])
    ->setPreferencias(["tema" => "escuro", "notificacoes" => "email"])
    ->getPerfil();

echo $perfil;
