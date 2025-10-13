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
     * Metodo que executa as queries
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        
        try {
           $statement = $this->connection->prepare($query);
           $statement->execute($params);
           
           return $statement;
           
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                
                header('location: index.php?status=');
                exit;
            }else {
                die('ERROR:'.$e->getMessage());
            }
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

        $this->execute($query,array_values($valores));

        return $this->connection->lastInsertId();
    }

    /**
     * Método para executar uma consulta no banco
     * @param string
     * @param string
     * @param string
     * @param string
     * @return PDOStatement
     */
    public function select($where = null, $and = null, $group = null, $order = null, $fields = null, $limit = null, $join = null){
   

    $where = !empty($where) ? ' WHERE ' . $where : '';
    $and = !empty($and) ? ' AND ' . $and : '';
    $fields = !empty($fields) ? ''. $fields : '*';
    $group = !empty($group) ? ' GROUP BY ' .$group : '';
    $order = !empty($order) ? ' ORDER BY ' .$order : '';
    $limit = !empty($limit) ? ' LIMIT ' .$limit : '';
    $join  = !empty($join)  ? ''.$join : '';

    $query = 'SELECT '.$fields.' FROM '.$this->table.''.$join.$where.$and.$group.$order.$limit;

    return $this->execute($query);
 
    }

    /**
     * Método para executar atualizaçoes no banco
     * @param string
     * @param array
     * @return boolean
     */
    public function update($where, $valores){

        $fields = array_keys($valores);

        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;
    
        $this->execute($query, array_values($valores));

        return true;
        }

        /**
         * Método para deletar no banco
         * @param string
         * @return boolean
         */

        public function delete($where, $and = null){

        $and = !empty($and) ? ' AND ' . $and : '';

        $query = 'DELETE FROM '.$this->table.' WHERE '.$where.$and;
                
        $this->execute($query);

        return true;
        }
}

?>