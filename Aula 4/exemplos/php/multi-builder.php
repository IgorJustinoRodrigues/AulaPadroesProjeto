<?php

interface PedidoBuilderInterface
{
    public function adicionarItem($nome, $preco, $quantidade);
    public function setEntrega($endereco, $cidade, $estado, $cep);
    public function setMetodoPagamento($metodo);
    public function calcularTotal();
    public function getPedido();
}

class Pedido
{
    public $itens = [];
    public $entrega = null;
    public $metodoPagamento = null;
    public $total = 0;

    public function __toString()
    {
        $itensStr = array_map(fn($item) => "{$item['nome']} - {$item['quantidade']} x {$item['preco']}", $this->itens);
        $itensStr = implode(", ", $itensStr);
        return "Itens: [{$itensStr}], Entrega: " . json_encode($this->entrega) .
            ", Método de Pagamento: {$this->metodoPagamento}, Total: {$this->total}";
    }
}

class PedidoCompletoBuilder implements PedidoBuilderInterface
{
    private $pedido;

    public function __construct()
    {
        $this->pedido = new Pedido();
    }

    public function adicionarItem($nome, $preco, $quantidade)
    {
        $this->pedido->itens[] = ["nome" => $nome, "preco" => $preco, "quantidade" => $quantidade];
        return $this;
    }

    public function setEntrega($endereco, $cidade, $estado, $cep)
    {
        $this->pedido->entrega = [
            "endereco" => $endereco,
            "cidade" => $cidade,
            "estado" => $estado,
            "cep" => $cep
        ];
        return $this;
    }

    public function setMetodoPagamento($metodo)
    {
        $this->pedido->metodoPagamento = $metodo;
        return $this;
    }

    public function calcularTotal()
    {
        $this->pedido->total = array_reduce($this->pedido->itens, function ($total, $item) {
            return $total + ($item['preco'] * $item['quantidade']);
        }, 0);

        // Aplica desconto de 10% para pedidos acima de $100
        if ($this->pedido->total > 100) {
            $this->pedido->total *= 0.9;
        }
        return $this;
    }

    public function getPedido()
    {
        return $this->pedido;
    }
}

class PedidoRetiradaBuilder implements PedidoBuilderInterface
{
    private $pedido;

    public function __construct()
    {
        $this->pedido = new Pedido();
    }

    public function adicionarItem($nome, $preco, $quantidade)
    {
        $this->pedido->itens[] = ["nome" => $nome, "preco" => $preco, "quantidade" => $quantidade];
        return $this;
    }

    public function setEntrega($endereco, $cidade, $estado, $cep)
    {
        // Ignora a entrega, pois é um pedido para retirada
        return $this;
    }

    public function setMetodoPagamento($metodo)
    {
        $this->pedido->metodoPagamento = $metodo;
        return $this;
    }

    public function calcularTotal()
    {
        $this->pedido->total = array_reduce($this->pedido->itens, function ($total, $item) {
            return $total + ($item['preco'] * $item['quantidade']);
        }, 0);
        return $this;
    }

    public function getPedido()
    {
        return $this->pedido;
    }
}

// Usando PedidoCompletoBuilder para um pedido com entrega
$completoBuilder = new PedidoCompletoBuilder();
$pedidoCompleto = $completoBuilder->adicionarItem("Laptop", 800, 1)
    ->adicionarItem("Mouse", 20, 2)
    ->setEntrega("Rua B, 456", "Goiânia", "GO", "74000-000")
    ->setMetodoPagamento("Cartão de Crédito")
    ->calcularTotal()
    ->getPedido();
echo "Pedido Completo:\n";
echo $pedidoCompleto;

echo "\n\n";
echo "<br><br>";

// Usando PedidoRetiradaBuilder para um pedido de retirada na loja
$retiradaBuilder = new PedidoRetiradaBuilder();
$pedidoRetirada = $retiradaBuilder->adicionarItem("Teclado", 30, 1)
    ->adicionarItem("Fone de ouvido", 50, 1)
    ->setMetodoPagamento("Dinheiro")
    ->calcularTotal()
    ->getPedido();
echo "Pedido para Retirada:\n";
echo $pedidoRetirada;
