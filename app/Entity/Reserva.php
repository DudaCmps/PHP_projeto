<?php 

namespace App\Entity;

use App\Db\Database;
use PDO;

class Reserva{

    /**
     * Identificador único do cliente
     * @var int
     */
    public $id_reserva;

    /**
     * id do cliente
     * @var int
     */
    public $fk_cliente;

    /**
     * id do veiculo
     * @var int
     */
    public $fk_carro;

    /**
     * status da reserva
     * @var string
     */
    public $estado;

    /**
     * Método de cadastro de uma reserva
     * @return boolean
     */
    public function cadastrar(){

        $obDatabase = new Database('reserva');

        
        $this->id_reserva = $obDatabase->insert([
                                'fk_cliente'=> $this->fk_cliente,
                                'fk_carro'=> $this->fk_carro
                                
                            ]);
                            
        return true;
    }

    /**
     * Método de atualizar dados 
     * @return boolean
     */
    public function atualizar(){
        return(new Database('reserva'))->update('id_reserva ='.$this->id_reserva, [
                                                                'estado'=> $this->estado                                                        
        ]);
        
    }

    /**
     * Método de excluir
     * @return boolean
    */
    public function excluir(){

        return(new Database('reserva'))->delete('id_reserva =' .$this->id_reserva, 'fk_carro =' .$this->fk_carro);
        
    }

        /**
     * Método para obter o veiculo mais alugado
     * @param string
     * @param string
     * @param string
     * @return Reserva
     */
    public static function getReservaRank($where = null, $group = null, $order = null, $limit = null, $fields = null, $join = null){
        
        $where = ' v.id_carro = reserva.fk_carro
                 ';

        $join = ' INNER JOIN veiculos v ON reserva.fk_carro = v.id_carro
                ';
        $fields = ' v.*
                  ';

        $group = ' v.id_carro
        ';

        $order = ' count(*) DESC
                 ';

        $limit = ' 1
                 ';
                   
        return(new Database('reserva'))->select($where, $group, $order, $fields, $limit, $join)
                                                ->fetchObject(self::class);
                                               
    }

    /**
     * Método para obter as reservas do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getReservas($where = null, $group = null, $order = null, $limit = null, $fields = null, $join = null){
        
        $join = ' INNER JOIN clientes c ON reserva.fk_cliente = c.id_cliente
                  INNER JOIN veiculos v ON reserva.fk_carro = v.id_carro
                ';
        $fields = 'reserva.*,
                   c.*,
                   v.*,
                   reserva.estado';
                   
        return(new Database('reserva'))->select($where, $group, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,self::class);
                                               
    }

    /**
     * Método para buscar a reserva pelo id
     * @param integer
     * @return Reserva
     */
    public static function getReserva($id_reserva){
 
        return(new Database('reserva'))->select('id_reserva = '.$id_reserva)
                                               ->fetchObject(self::class);
        
    }
    
}

?>