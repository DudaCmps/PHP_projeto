<?php 

namespace App\Entity;

use App\Db\Database;
use PDO;

class Veiculo{

    /**
     * Identificador único do usuario
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
    public $estado_carro;

    /**
     * Status do veiculo
     * @var String
     */
    public $nomeMarca;

    /**
     * Status do veiculo
     * @var String
     */
    public $nomeModelo;

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
                                'estado_carro'=> $this->estado_carro
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
     * @return Reserva
     */
    public static function getVeiculos($where = null, $group = null, $order = null, $limit = null, $fields = null, $join = null){
       
        $join = ' INNER JOIN modelos mo ON veiculos.fk_modelo = mo.id_modelo';
        $fields = ' veiculos.id_carro,
                   mo.nome,
                   veiculos.ano_fabricacao,
                   veiculos.placa,
                   veiculos.categoria,
                   veiculos.estado_carro';
                   
        return(new Database('veiculos'))->select($where,$group, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,self::class);
                                               
    }

    // /**
    //  * Método para buscar o usuario pelo id
    //  * @param integer
    //  * @return Veiculo
    //  */
    // public static function getVeiculo($id_carro){
 
    //     return(new Database('veiculos'))->select('id_carro = '.$id_carro)
    //                                            ->fetchObject(self::class);
        
    // }

    /**
     * Método para buscar o usuario pelo id
     * @param integer
     * @returnc
     */
    public static function getVeiculo($id_carro, $fields = null, $join = null){

        $join = ' INNER JOIN modelos mo ON veiculos.fk_modelo = mo.id_modelo
                  INNER JOIN marcas ma ON mo.fk_marca = ma.id_marca';
                  
        $fields = ' veiculos.*,
                    mo.nome AS nomeModelo,
                    ma.nome AS nomeMarca';

        return(new Database('veiculos'))->select('veiculos.id_carro = '.$id_carro, $group=null, $order=null, $fields, $limit = null, $join)
                                               ->fetchObject(self::class);
        
    }
}