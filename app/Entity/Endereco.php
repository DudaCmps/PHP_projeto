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
     * Método para buscar o endereco pelo id do cliente
     * @param integer
     * @return Endereco
     */
    public static function getEndereco($id_cliente){

        return(new Database('endereco'))->select('id_cliente = '.$id_cliente)
                                               ->fetchObject(self::class);
        
    }
}