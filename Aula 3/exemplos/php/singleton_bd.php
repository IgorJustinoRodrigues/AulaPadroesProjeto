<?php
class Database
{
    // Instância única da classe
    private static $instance = null;
    private $connection;
    private $log = [];

    // Construtor privado: inicializa a conexão
    private function __construct()
    {
        // Parâmetros de conexão com o banco de dados
        $host = 'localhost';
        $dbname = 'meu_banco';
        $username = 'root';
        $password = '';

        // Criação da conexão usando PDO
        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }

    // Método estático para obter a instância única
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Método para executar uma consulta SQL
    public function query($sql)
    {
        try {
            $statement = $this->connection->prepare($sql);

            $statement->execute();

            $this->log[] = "Consulta executada: $sql";
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->log[] = "Erro na consulta: " . $e->getMessage();
            return false;
        }
    }

    // Método para obter o log de consultas
    public function getLog()
    {
        return $this->log;
    }

    // Método para fechar a conexão (opcional)
    public function closeConnection()
    {
        $this->connection = null;
        $this->log[] = "Conexão fechada.";
    }
}

// Uso do Singleton para gerenciamento de banco de dados
$db = Database::getInstance();

// Executando uma consulta
$result = $db->query("SELECT * FROM usuarios");
echo '<pre>';
if ($result) {
    echo "Dados retornados:<br>";
    print_r($result);
} else {
    echo "Erro na consulta.<br>";
}

// Obtendo o log de operações
echo "<br><br>Log de operações:<br>";
print_r($db->getLog());

// Tentativa de criar uma nova instância (não permitida)
$db2 = Database::getInstance();
echo $db === $db2 ? "<br>Mesma instância do banco de dados<br>" : "<br>Instâncias diferentes do banco de dados<br>";

// Fechando a conexão
$db->closeConnection();
