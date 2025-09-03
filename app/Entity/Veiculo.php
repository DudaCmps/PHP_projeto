<?php 

namespace App\Entity;

use App\Db\Database;
use PDO;

class Veiculo{

    /**
     * Identificador único do cliente
     * @var int
     */
    public $id_carro;

    /**
     * Identificador único do modelo
     * @var int
     */
    public $fk_modelo;

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
        $this->id_carro = $obDatabase->insert([
                                'fk_modelo'=> $this->fk_modelo,
                                'ano_fabricacao'=> $this->ano_fabricacao,
                                'placa'=> $this->placa,
                                'categoria'=> $this->categoria,
                                
                            ]);
        return true;

    }

    /**
     * Método de atualizar dados 
     * @return boolean
     */
    public function atualizar(){
        return(new Database('veiculos'))->update('id_carro ='.$this->id_carro, [
                                'fk_modelo'=> $this->fk_modelo,
                                'ano_fabricacao'=> $this->ano_fabricacao,
                                'placa'=> $this->placa,
                                'categoria'=> $this->categoria,
                                'estado'=> $this->estado
                            ]);
        
    }


    /**
     * Método de excluir
     * @return boolean
    */
    public function excluir(){

        return(new Database('veiculos'))->delete('id_carro =' .$this->id_carro);
        
    }

    /**
     * Método para obter os carros do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getVeiculos($where = null, $order = null, $limit = null, $fields = null, $join = null){
        
        $join = ' INNER JOIN modelos mo ON veiculos.fk_modelo = mo.id_modelo';
        $fields = 'veiculos.id_carro,
                   mo.nome,
                   veiculos.ano_fabricacao,
                   veiculos.placa,
                   veiculos.categoria,
                   veiculos.estado';
                   
        return(new Database('veiculos'))->select($where, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,self::class);
                                               
    }

    /**
     * Método para buscar o cliente pelo id
     * @param integer
     * @return Veiculo
     */
    public static function getVeiculo($id_carro){
 
        return(new Database('veiculos'))->select('id_carro = '.$id_carro)
                                               ->fetchObject(self::class);
        
    }
}