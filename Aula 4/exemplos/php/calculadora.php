<?php

interface CalculadoraBuilderInterface
{
    //Recebe o primeiro número do calculo
    public function adicionar($num);
    
    // Método para aplicar subtrações
    public function subtrair($num);
    
    // Método para aplicar soma
    public function somar($num);
    
    // Método para retornar o resultado da conta
    public function get();
    
    // Método para limpar os dados dos calculos
    public function limpar();
}

class Calculadora{
  public $total;
  
}

class CalculadoraBuilder implements CalculadoraBuilderInterface{
  private $resultado;
  
  public function __construct(){
    $this->resultado = new Calculadora();
  }
  
  public function adicionar($num){
    $this->resultado->total = $num;
    return $this;
  }
  
  public function subtrair($num){
    $this->resultado->total -= $num;
    return $this;
  }
  
  public function somar($num){
    $this->resultado->total += $num;
    return $this;
  }
  
  public function get(){
    return $this->resultado->total;
  }
  
  public function limpar(){
    $this->resultado->total = 0;
    return $this;
  }
}

$calculadora = new CalculadoraBuilder();

$total = $calculadora->adicionar(10)
  ->somar(40)
  ->somar(10)
  ->subtrair(5)
  ->get();

echo $total;
