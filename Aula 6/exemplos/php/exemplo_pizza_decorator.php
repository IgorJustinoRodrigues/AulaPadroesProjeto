<?php

// Interface Pizza
interface Pizza
{
    public function getDescricao();
    public function getCusto();
    public function getTempoPreparo();
}

// Classe concreta PizzaBase que implementa a interface Pizza
class PizzaBase implements Pizza
{
    public function getDescricao()
    {
        return "Pizza base";
    }

    public function getCusto()
    {
        return 10.0; // Custo base
    }

    public function getTempoPreparo()
    {
        return 15; // Tempo de preparo base em minutos
    }
}

// Classe abstrata PizzaDecorator que também implementa Pizza
abstract class PizzaDecorator implements Pizza
{
    protected $pizza;

    public function __construct(Pizza $pizza)
    {
        $this->pizza = $pizza;
    }
}

// Decorador concreto para Queijo Extra
class QueijoExtra extends PizzaDecorator
{
    public function getDescricao()
    {
        return $this->pizza->getDescricao() . ", Queijo Extra";
    }

    public function getCusto()
    {
        return $this->pizza->getCusto() + 2.5;
    }

    public function getTempoPreparo()
    {
        return $this->pizza->getTempoPreparo(); // Não altera o tempo de preparo
    }
}

// Decorador concreto para Pepperoni
class Pepperoni extends PizzaDecorator
{
    public function getDescricao()
    {
        return $this->pizza->getDescricao() . ", Pepperoni";
    }

    public function getCusto()
    {
        return $this->pizza->getCusto() + 3.0;
    }

    public function getTempoPreparo()
    {
        return $this->pizza->getTempoPreparo() + 2; // Adiciona 2 minutos ao tempo de preparo
    }
}

// Decorador concreto para Cogumelos
class Cogumelos extends PizzaDecorator
{
    public function getDescricao()
    {
        return $this->pizza->getDescricao() . ", Cogumelos";
    }

    public function getCusto()
    {
        return $this->pizza->getCusto() + 1.8;
    }

    public function getTempoPreparo()
    {
        return $this->pizza->getTempoPreparo() + 1; // Adiciona 1 minuto ao tempo de preparo
    }
}

// Decorador concreto para Molho Especial
class MolhoEspecial extends PizzaDecorator
{
    public function getDescricao()
    {
        return $this->pizza->getDescricao() . ", Molho Especial";
    }

    public function getCusto()
    {
        return $this->pizza->getCusto() + 1.5;
    }

    public function getTempoPreparo()
    {
        return $this->pizza->getTempoPreparo() + 3; // Adiciona 3 minutos ao tempo de preparo
    }
}

// Uso do padrão Decorator para criar uma pizza personalizada

// Cria uma pizza base
$pizza = new PizzaBase();

// Adiciona queijo extra à pizza
$pizzaComQueijo = new QueijoExtra($pizza);

// Adiciona pepperoni e cogumelos à pizza com queijo extra
$pizzaCompleta = new Cogumelos(new Pepperoni($pizzaComQueijo));

// Adiciona molho especial à pizza completa
$pizzaFinal = new MolhoEspecial($pizzaCompleta);

// Exibe a descrição, custo total e tempo de preparo total da pizza
echo "Descrição: " . $pizzaFinal->getDescricao() . '<br>';
echo "Custo Total: R$ " . $pizzaFinal->getCusto() . '<br>';
echo "Tempo de Preparo: " . $pizzaFinal->getTempoPreparo() . " minutos<br>";
