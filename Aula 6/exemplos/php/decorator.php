<?php

// Interface Cafe que define os métodos básicos para obter descrição e custo
interface Cafe
{
    public function getDescricao();
    public function getCusto();
}

// Classe concreta CafeBasico que implementa a interface Cafe
// Representa o café básico com uma descrição e custo fixo
class CafeBasico implements Cafe
{
    public function getDescricao()
    {
        return "Café básico";
    }
    public function getCusto()
    {
        return 5.0;
    }
}

// Classe abstrata CafeDecorator que também implementa a interface Cafe
// Essa classe serve como base para os decoradores de café
abstract class CafeDecorator implements Cafe
{
    protected $cafe;

    // O construtor recebe um objeto Cafe, que será decorado
    public function __construct(Cafe $cafe)
    {
        $this->cafe = $cafe;
    }
}

// Decorador concreto Leite que adiciona leite ao café
class Leite extends CafeDecorator
{
    public function getDescricao()
    {
        // Adiciona "Leite" à descrição do café decorado
        return $this->cafe->getDescricao() . ", Leite";
    }

    public function getCusto()
    {
        // Adiciona o custo do leite ao custo do café decorado
        return $this->cafe->getCusto() + 1.5;
    }
}

// Decorador concreto Canela que adiciona canela ao café
class Canela extends CafeDecorator
{
    public function getDescricao()
    {
        // Adiciona "Canela" à descrição do café decorado
        return $this->cafe->getDescricao() . ", Canela";
    }

    public function getCusto()
    {
        // Adiciona o custo da canela ao custo do café decorado
        return $this->cafe->getCusto() + 0.75;
    }
}

// Decorador concreto Chocolate que adiciona chocolate ao café
class Chocolate extends CafeDecorator
{
    public function getDescricao()
    {
        // Adiciona "Chocolate" à descrição do café decorado
        return $this->cafe->getDescricao() . ", Chocolate";
    }

    public function getCusto()
    {
        // Adiciona o custo do chocolate ao custo do café decorado
        return $this->cafe->getCusto() + 2.0;
    }
}

// Uso do padrão Decorator para compor o café com diferentes ingredientes

// Cria um café básico
$cafe = new CafeBasico();

// Adiciona leite ao café básico
$cafeComLeite = new Leite($cafe);

// Adiciona chocolate e canela ao café com leite
$cafeCompleto = new Canela(new Chocolate($cafeComLeite));

// Exibe a descrição e o valor total do café com todos os ingredientes adicionados
echo "Descrição: " . $cafeCompleto->getDescricao() . ' <br>';
echo "Valor Total: R$ " . $cafeCompleto->getCusto();
