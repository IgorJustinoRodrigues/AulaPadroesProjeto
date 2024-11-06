<?php
interface FuncionarioBuilderInterface
{
    public function setInformacoesBasicas($nome, $email, $telefone);
    public function setEndereco($rua, $cidade, $estado);
    public function setInformacoesTrabalho($cargo, $departamento, $salario);
    public function getFuncionario();
}

class Funcionario
{
    public $nome;
    public $email;
    public $telefone;
    public $endereco = [];
    public $cargo;
    public $departamento;
    public $salario;

    public function __toString()
    {
        return "Nome: {$this->nome}, E-mail: {$this->email}, Telefone: {$this->telefone}, " .
            "Endereço: " . json_encode($this->endereco) . ", Cargo: {$this->cargo}, " .
            "Departamento: {$this->departamento}, Salário: {$this->salario}";
    }
}

class FuncionarioBuilder implements FuncionarioBuilderInterface
{
    private $funcionario;

    public function __construct()
    {
        $this->funcionario = new Funcionario();
    }

    // Bloco de Informações Básicas
    public function setInformacoesBasicas($nome, $email, $telefone)
    {
        $this->funcionario->nome = $nome;
        $this->funcionario->email = $email;
        $this->funcionario->telefone = $telefone;
        return $this;
    }

    // Bloco de Endereço
    public function setEndereco($rua, $cidade, $estado)
    {
        $this->funcionario->endereco = [
            "rua" => $rua,
            "cidade" => $cidade,
            "estado" => $estado
        ];
        return $this;
    }

    // Bloco de Informações de Trabalho
    public function setInformacoesTrabalho($cargo, $departamento, $salario)
    {
        $this->funcionario->cargo = $cargo;
        $this->funcionario->departamento = $departamento;
        $this->funcionario->salario = $salario;
        return $this;
    }

    // Retorna o objeto Funcionario completo
    public function getFuncionario()
    {
        return $this->funcionario;
    }
}

// Inicializa o Builder
$builder = new FuncionarioBuilder();

// Preenche informações em blocos separados
$funcionario = $builder->setInformacoesBasicas("João", "joao@example.com", "12345-6789")
    ->setEndereco("Rua A, 123", "Ceres", "GO")
    ->setInformacoesTrabalho("Desenvolvedor", "TI", 7000)
    ->getFuncionario();

// Exibe o objeto Funcionario completo
echo $funcionario;
