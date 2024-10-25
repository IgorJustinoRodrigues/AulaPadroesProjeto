<?php
class Singleton
{
    // Instância única da classe
    private static $instance = null;
    
    // Propriedades da classe
    private $data;

    // O construtor é privado para evitar a criação direta de uma instância
    private function __construct()
    {
        // Pode inicializar propriedades aqui, se necessário
        $this->data = "Exemplo de dados";
    }

    // Método estático para obter a instância única
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Método para obter dados (exemplo de funcionalidade da classe)
    public function getData()
    {
        return $this->data;
    }
}

// Uso do Singleton
$instance1 = Singleton::getInstance();
echo $instance1->getData(); // Saída: Exemplo de dados
echo '<br>';
$instance2 = Singleton::getInstance();
$instance1 === $instance2 ? print "Mesma instância" : print "Instâncias diferentes"; // Saída: Mesma instância
?>
