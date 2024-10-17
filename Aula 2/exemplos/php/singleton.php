<?php
class ProdutoSingleton
{
    private static $instanciaUnica = null;
    private $valor = 10;

    // Método para obter a instância única
    public static function getInstancia()
    {
        if (self::$instanciaUnica == null) {
            self::$instanciaUnica = new ProdutoSingleton();
        }
        return self::$instanciaUnica;
    }

    // Método para exibir o valor
    public function getValor()
    {
        return $this->valor;
    }

    // Método para modificar o valor
    public function setValor($novoValor)
    {
        $this->valor = $novoValor;
    }
}

try {
    // Teste do Singleton
    $acesso1 = ProdutoSingleton::getInstancia();
    echo "Acesso1: Valor inicial do produto: R$ " . $acesso1->getValor() . "<br>";

    $acesso1->setValor(150);
    echo "Acesso1: Valor " . $acesso1->getValor() . "<br>";

    $acesso2 = ProdutoSingleton::getInstancia();
    echo "Acesso2: Valor R$ " . $acesso2->getValor() . "<br>";
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
