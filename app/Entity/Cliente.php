<?php 
// echo "<pre>"; print_r($obDatabase); echo "</pre>"; exit;
namespace App\Entity;

use App\Db\Database;

class Cliente{

    /**
     * Identificador único do cliente
     * @var int
     */
    public $id;

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
        $obDatabase->insert([
                                'nome'=> $this->nome,
                                'cpf'=> $this->cpf,
                                'data_nasc'=> $this->data_nasc,
                                'telefone'=> $this->telefone
                            ]);
    }
}

?>