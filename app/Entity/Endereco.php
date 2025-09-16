<?php 

namespace App\Entity;
use App\Db\Database;

use PDO;

class Endereco{

    /**
     * Identificador único do endereco
     * @var int
     */
    public $id_endereco;

    /**
     * Identificador único do cliente ligado ao endereço
     * @var int
     */
    public $fk_cliente;

    /**
     * Cidade do endereço
     * @var string
     */
    public $cidade;

    /**
     * Estado do endereço
     * @var string
     */
    public $estado;

    /**
     * CEP do endereço
     * @var string
     */
    public $cep;

    /**
     * Bairro do endereço
     * @var string
     */
    public $bairro;

    /**
     * Logradouro do endereço
     * @var string
     */
    public $logradouro;

    /**
     * Numero do endereço
     * @var int
     */
    public $numero;

    /**
     * Complemento do endereço
     * @var string
     */
    public $complemento;

    /**
     * Método de cadastro de um endereço no banco
     * @return boolean
     */
    public function cadastrar(){

        $obDatabase = new Database('endereco');
        $this->id_endereco = $obDatabase->insert([
                                'fk_cliente'=> $this->fk_cliente,
                                'cidade'=> $this->cidade,
                                'estado'=> $this->estado,
                                'cep'=> $this->cep,
                                'bairro'=> $this->bairro,
                                'logradouro'=> $this->logradouro,
                                'numero'=> $this->numero,
                                'complemento'=> $this->complemento
                            ]);
                            
        return true;
    }

    /**
     * Método de atualizar dados 
     * @return boolean
     */
    public function atualizar(){
        return(new Database('endereco'))->update('id_endereco ='.$this->id_endereco, [
                                                                'cidade'=> $this->cidade,
                                                                'estado'=> $this->estado,
                                                                'cep'=> $this->cep,
                                                                'bairro'=> $this->bairro,
                                                                'logradouro'=> $this->logradouro,
                                                                'numero'=> $this->numero,
                                                                'complemento'=>$this->complemento                                                 
                                                                    ]);
        
    }

    /**
     * Método de excluir
     * @return boolean
    */
    public function excluir(){

        return(new Database('endereco'))->delete('id_endereco =' .$this->id_endereco, 'id_endereco =' .$this->id_endereco);
        
    }

    /**
     * Método para obter os enderecos do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getEnderecos($id_user, $group = null, $order = null, $limit = null, $fields = null, $join = null){
        
        $join = ' INNER JOIN usuarios client ON endereco.fk_cliente = client.id_user';
        $fields = 'client.id_user,
                   endereco.*';  
                   
        return(new Database('endereco'))->select(' endereco.fk_cliente = '.$id_user,$group, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,                                    self::class);                                        
    }

    /**
     * Método para buscar o endereco 
     * @param integer
     * @return Endereco
     */
    public static function getEndereco($id_endereco){

        return(new Database('endereco'))->select('id_endereco = '.$id_endereco)
                                               ->fetchObject(self::class);
        
    }
}