<?php
// Interface Produto
interface Produto
{
    public function getTipo();
}

// Classe concreta Carro que implementa Produto
class Carro implements Produto
{
    public function getTipo()
    {
        return "Eu sou um Carro";
    }
}

// Classe concreta Moto que implementa Produto
class Moto implements Produto
{
    public function getTipo()
    {
        return "Eu sou uma Moto";
    }
}

// Classe Fábrica
class FabricaVeiculos
{
    // Método Factory que cria instâncias baseadas no tipo fornecido
    public static function criarVeiculo($tipo)
    {
        switch ($tipo) {
            case 'carro':
                return new Carro();
            case 'moto':
                return new Moto();
            default:
                throw new Exception("Tipo de veículo inválido.");
        }
    }
}

// Uso do Factory
try {
    $veiculo1 = FabricaVeiculos::criarVeiculo('carro');
    echo $veiculo1->getTipo(); // Saída: Eu sou um Carro

    echo "<br>";

    $veiculo2 = FabricaVeiculos::criarVeiculo('moto');
    echo $veiculo2->getTipo(); // Saída: Eu sou uma Moto
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
