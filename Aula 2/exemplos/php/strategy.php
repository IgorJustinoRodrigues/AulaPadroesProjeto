<?php
// Interface para a estratégia de modificação de valor
// Tipo regras, metodos que as estratégias precisam ter...
// Vamos precisar ter interface e estrategias

interface EstrategiaValor
{
    public function alterarValor($valor);
}

// Estratégia para aplicar desconto
// O implements é usado em PHP para indicar que uma classe vai implementar uma interface. Isso significa que a classe deve definir todos os métodos que estão declarados na interface.
class Desconto implements EstrategiaValor
{
    public function alterarValor($valor)
    {
        return $valor * 0.9; // 10% de desconto
    }
}

// Estratégia para aplicar aumento
class Aumento implements EstrategiaValor
{
    public function alterarValor($valor)
    {
        return $valor * 1.1; // 10% de aumento
    }
}

// Classe Produto que usa a estratégia de valor
class Produto
{
    private $valor;
    private $estrategia;

    public function __construct($valor, EstrategiaValor $estrategia)
    {
        $this->valor = $valor;
        $this->estrategia = $estrategia;
    }

    // Exibe o valor atual
    public function getValor()
    {
        return $this->valor;
    }

    // Aplica a estratégia de alteração de valor
    // faz esse por ultimo
    public function aplicarEstrategia()
    {
        $this->valor = $this->estrategia->alterarValor($this->valor);
    }
}

try {
    // Teste do Strategy
    $produto = new Produto(100, new Aumento());
    echo "Valor inicial do produto: R$ " . $produto->getValor() . "<br>";

    // faz esse por ultimo
    $produto->aplicarEstrategia();

    echo "Valor após desconto: R$ " . $produto->getValor() . "<br>";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
