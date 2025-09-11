<?php 

namespace App\Entity;

use App\Db\Database;
use PDO;

class Cliente{

    /**
     * Identificador único do cliente
     * @var int
     */
    public $id_cliente;

    /**
     * Nome completo do cliente
     * @var string
     */
    public $nome;

    /**
     * CPF do cliente
     * @var string
     */
    public $cpf;

    /**
     * Data de nascimento do cliente
     * @var string (formato YYYY-MM-DD)
     */
    public $data_nasc;

    /**
     * Número de telefone do cliente
     * @var integer
     */
    public $telefone;

    /**
     * Método de cadastro de um cliente no banco
     * @return boolean
     */
    public function cadastrar(){

        $obDatabase = new Database('clientes');
        $this->id_cliente = $obDatabase->insert([
                                'nome'=> $this->nome,
                                'cpf'=> $this->cpf,
                                'data_nasc'=> $this->data_nasc,
                                'telefone'=> $this->telefone
                            ]);
                            
        return true;
    }
    

    /**
     * Método de atualizar dados 
     * @return boolean
     */
    public function atualizar(){
        return(new Database('clientes'))->update('id_cliente ='.$this->id_cliente, [
                                'nome'=> $this->nome,
                                'cpf'=> $this->cpf,
                                'data_nasc'=> $this->data_nasc,
                                'telefone'=> $this->telefone
                            ]);
        
    }

    /**
     * Método de excluir
     * @return boolean
     */
    public function excluir(){

        return(new Database('clientes'))->delete('id_cliente =' .$this->id_cliente);
        
    }

    /**
     * Método para obter as vagas do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getClientes($where = null,$group = null, $order = null, $limit = null, $fields = null, $join = null){
        
       
        $fields = 'clientes.id_cliente,
                   clientes.nome,
                   clientes.cpf,
                   clientes.data_nasc,
                   clientes.telefone
                   ';
                   
        return(new Database('clientes'))->select($where,$group, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,self::class);
                                               
    }

    /**
     * Método para buscar o cliente pelo id
     * @param integer
     * @return Cliente
     */
    public static function getCliente($id_cliente){
 
        return(new Database('clientes'))->select('id_cliente = '.$id_cliente)
                                               ->fetchObject(self::class);
        
    }
}

?>