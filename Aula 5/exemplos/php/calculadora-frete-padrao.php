<?php

class CalculadoraFrete
{
    public function calcularFrete($tipoFrete, $peso)
    {
        if ($tipoFrete === 'terrestre') {
            return $peso * 0.5;
        } elseif ($tipoFrete === 'aereo') {
            return $peso * 1.5;
        } else {
            throw new Exception("Tipo de frete desconhecido.");
        }
    }
}

// Uso do código
$calculadora = new CalculadoraFrete();
echo "Frete Terrestre: " . $calculadora->calcularFrete('terrestre', 10) . "\n";
echo "Frete Aéreo: " . $calculadora->calcularFrete('aereo', 10) . "\n";
