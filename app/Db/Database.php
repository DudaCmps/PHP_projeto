<?php 

namespace App\Db;


use \PDO;
use \PDOException;


class Database {

    /**
     * Nome do banco de dados
     * @var string
     */
    const HOST = 'localhost';
    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'locafast';
    /**
     * Usuário do banco de dados
     * @var string 
     */

    const USER = 'root';
    /**
     * Senha do usuário do banco de dados
     * @var string
     */
    const PASS = '1234';

    /**
     * Nome da tabela atual em uso
     * @var string
     */
    private $table;
    /**
     * Conexão PDO com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia e conexão
     * @param string
     */
    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Metodo que cria a conexão
     */
    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Metodo que insere dados no banco
     * @param array
     * @return integer
     */
    public function insert($valores){

        $fields = array_keys($valores);
        $binds  = array_pad([],count($fields),'?');

        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';
        
        
    }
}

?>