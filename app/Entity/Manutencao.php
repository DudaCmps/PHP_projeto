<?php 

namespace App\Entity;

use App\Db\Database;
use PDO;

class Manutencao{

    /**
     * Identificador único da manutenção
     * @var int
     */
    public $id_manutencao;

    /**
     * Identificador único do carro
     * @var int
     */
    public $fk_carro;

    /**
     * descricao da manutencao
     * @var string
     */
    public $descricao;

    /**
     * data da manutenção
     * @var string
     */
    public $data_manutencao;


    /**
     * Método pra criar uma manutenção
     * @return boolean
     */
    public function cadastrar(){

        $obDatabase = new Database('manutencao');

        $this->id_manutencao = $obDatabase->insert([
                                'fk_carro'=> $this->fk_carro,
                                'descricao'=> $this->descricao,
                                'data_manutencao'=> $this->data_manutencao

                                
                            ]);
                            
        return true;
    }

    /**
     * Método de excluir
     * @return boolean
    */
    public function excluir(){

       return(new Database('manutencao'))->delete('id_manutencao ='.$this->id_manutencao);
                                                   
        
    }

    /**
     * Método para obter os carros em manutenção do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getManutencoes($where = null, $and = null, $group = null, $order = null, $limit = null, $fields = null, $join = null){
        
        $join = ' INNER JOIN veiculos ON manutencao.fk_carro = veiculos.id_carro';
        $fields = 'manutencao.id_manutencao,
                   manutencao.descricao,
                   manutencao.data_manutencao,
                   veiculos.placa
                   ';
        return(new Database('manutencao'))->select($where, $and,$group, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,self::class);
                                               
    }

    /**
     * Método para buscar o usuario pelo id
     * @param integer
     * @return Manutencao
     */
    public static function getManutencao($id_manutencao){
 
        return(new Database('manutencao'))->select('id_manutencao = '.$id_manutencao)
                                               ->fetchObject(self::class);
        
    }
}