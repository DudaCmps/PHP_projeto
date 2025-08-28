<?php 

namespace App\Entity;

use App\Db\Database;
use PDO;

class Veiculo{

    /**
     * Identificador único do cliente
     * @var int
     */
    public $id_veiculo;

    /**
     * Identificador único do modelo
     * @var int
     */
    public $id_modelo;

    /**
     * Ano de fabricação
     * @var string
     */
    public $ano_fabricacao;

    /**
     * Placa do veiculo
     * @var string
     */
    public $placa;

    /**
     * Categoria do veiculo
     * @var String
     */
    public $categoria;

    /**
     * Status do veiculo
     * @var String
     */
    public $estado;

/**
     * Método de cadastro de um veiculo no banco
     * @return boolean
     */
    public function cadastrar(){

        $obDatabase = new Database('veiculos');
        $this->id_veiculo = $obDatabase->insert([
                                'id_modelo'=> $this->id_modelo,
                                'ano_fabricacao'=> $this->ano_fabricacao,
                                'placa'=> $this->placa,
                                'categoria'=> $this->categoria,
                                'estado'=> $this->estado
                            ]);
        return true;

    }
}