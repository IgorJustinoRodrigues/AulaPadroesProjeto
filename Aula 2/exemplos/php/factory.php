<?php
// Interface para estratégia de modificação de valor
interface EstrategiaValor
{
    public function alterarValor($valor);
}

// Implementação de desconto
class Desconto implements EstrategiaValor
{
    public function alterarValor($valor)
    {
        return $valor * 0.9; // 10% de desconto
    }
}

// Implementação de aumento
class Aumento implements EstrategiaValor
{
    public function alterarValor($valor)
    {
        return $valor * 1.1; // 10% de aumento
    }
}

// Classe fábrica que decide qual ajuste aplicar
class EstrategiaFactory
{
    public static function criarEstrategiaValor($tipo)
    {
        switch ($tipo) {
            case "desconto":
                return new Desconto();
            case "aumento":
                return new Aumento();
            default:
                throw new Exception("Tipo de ajuste desconhecido.");
        }
    }
}

// Teste do Factory
try {
    // $cl = new EstrategiaFactory();
    // $estrategia = $cl->criarEstrategiaValor("desconto"); 
    $estrategia = EstrategiaFactory::criarEstrategiaValor("desconto");
    $valor = 100;

    echo "Valor inicial: R$ " . $valor . "<br>";

    $valor = $estrategia->alterarValor($valor);
    echo "Valor após desconto: R$ " . $valor . "<br>";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
