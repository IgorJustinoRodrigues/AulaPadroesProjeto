<?php
// Interface para Pedido
interface Pedido
{
    public function processar();
}

// Classe concreta para Pedido Regular
class PedidoRegular implements Pedido
{
    public function processar()
    {
        echo "Processando um pedido regular.<br>";
        // Lógica específica para pedido regular
    }
}

// Classe concreta para Pedido Expresso
class PedidoExpresso implements Pedido
{
    public function processar()
    {
        echo "Processando um pedido expresso com prioridade alta.<br>";
        // Lógica específica para pedido expresso
    }
}

// Classe concreta para Pedido Internacional
class PedidoInternacional implements Pedido
{
    public function processar()
    {
        echo "Processando um pedido internacional com verificação de alfândega.<br>";
        // Lógica específica para pedido internacional
    }
}

// Fábrica Abstrata de Pedido
abstract class FabricaPedido
{
    abstract public function criarPedido(): Pedido;

    public function enviarPedido()
    {
        $pedido = $this->criarPedido();
        $pedido->processar();
    }
}

// Fábrica concreta para Pedido Regular
class FabricaPedidoRegular extends FabricaPedido
{
    public function criarPedido(): Pedido
    {
        return new PedidoRegular();
    }
}

// Fábrica concreta para Pedido Expresso
class FabricaPedidoExpresso extends FabricaPedido
{
    public function criarPedido(): Pedido
    {
        return new PedidoExpresso();
    }
}

// Fábrica concreta para Pedido Internacional
class FabricaPedidoInternacional extends FabricaPedido
{
    public function criarPedido(): Pedido
    {
        return new PedidoInternacional();
    }
}

// Cliente utilizando o Factory
$pedidoRegular = new FabricaPedidoRegular();
$pedidoRegular->enviarPedido(); // Saída: Processando um pedido regular.

$pedidoExpresso = new FabricaPedidoExpresso();
$pedidoExpresso->enviarPedido(); // Saída: Processando um pedido expresso com prioridade alta.

$pedidoInternacional = new FabricaPedidoInternacional();
$pedidoInternacional->enviarPedido(); // Saída: Processando um pedido internacional com verificação de alfândega.
