<?php

// Interface para estratégia de frete
interface FreteStrategy
{
    public function calcular($peso);
}

// Estratégia de frete terrestre
class FreteTerrestre implements FreteStrategy
{
    public function calcular($peso)
    {
        return $peso * 0.5;
    }
}

// Estratégia de frete aéreo
class FreteAereo implements FreteStrategy
{
    public function calcular($peso)
    {
        return $peso * 1.5;
    }
}

// Classe que usa a estratégia de frete
class CalculadoraFrete
{
    private $estrategia;

    // Define a estratégia no construtor
    public function __construct(FreteStrategy $estrategia)
    {
        $this->estrategia = $estrategia;
    }

    public function calcularFrete($peso)
    {
        return $this->estrategia->calcular($peso);
    }
}

// Uso do código refatorado

// Calculando frete terrestre
$calculadoraTerrestre = new CalculadoraFrete(new FreteTerrestre());
echo "Frete Terrestre: " . $calculadoraTerrestre->calcularFrete(10) . "\n";

// Calculando frete aéreo
$calculadoraAereo = new CalculadoraFrete(new FreteAereo());
echo "Frete Aéreo: " . $calculadoraAereo->calcularFrete(10) . "\n";
