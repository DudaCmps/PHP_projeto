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
     * Método para obter as reservas do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getReservas($where = null, $order = null, $limit = null, $fields = null, $join = null){
        
        $join = ' INNER JOIN clientes c ON reserva.fk_cliente = c.id_cliente
                  INNER JOIN veiculos v ON reserva.fk_carro = v.id_carro
                ';
        $fields = 'reserva.id_reserva,
                   c.nome,
                   v.placa,
                   v.placa,
                   reserva.estado';
                   
        return(new Database('reserva'))->select($where, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,self::class);
                                               
    }
    
}

?>