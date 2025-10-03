<?php 

namespace App\Entity;

use App\Db\Database;
use PDO;

class Reserva{

    /**
     * Identificador único do usuario
     * @var int
     */
    public $id_reserva;

    /**
     * id do usuario
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
                                                                'estado'=> $this->estado,
                                                                'fk_cliente'=> $this->fk_cliente,
                                                                'fk_carro'=> $this->fk_carro                                                 
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
    public static function getReservaRank($where = null, $and = null,$group = null, $order = null, $limit = null, $fields = null, $join = null){
        
        
        $join = ' INNER JOIN veiculos v ON reserva.fk_carro = v.id_carro ';
    
        $fields = ' reserva.fk_carro, COUNT(*) as total_alugueis ';
        
        $group = ' reserva.fk_carro ';
        
        $order = ' total_alugueis DESC ';
        
        $limit = ' 1 ';

                   
        return(new Database('reserva'))->select($where, $and , $group, $order, $fields, $limit, $join)
                                                ->fetchObject(self::class);
                                               
    }

    /**
     * Método para obter as reservas do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getReservas($where = null,  $and = null, $group = null, $order = null, $limit = null, $fields = null, $join = null){
        
        $join = ' INNER JOIN usuarios c ON reserva.fk_cliente = c.id_user
                  INNER JOIN veiculos v ON reserva.fk_carro = v.id_carro
                ';
        $fields = 'reserva.*,
                   c.*,
                   v.*
                   ';
                   
        return(new Database('reserva'))->select($where,$and, $group, $order, $fields, $limit, $join)
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

    /**
     * Método para obter as reservas do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getReservaUsuario($fk_cliente,$where = null, $and = null, $group = null, $order = null, $limit = null, $fields = null, $join = null){
        
        $join = ' INNER JOIN veiculos v ON reserva.fk_carro = v.id_carro
                  INNER JOIN modelos mo ON v.fk_modelo = mo.id_modelo
                  INNER JOIN marcas ma ON mo.fk_marca = ma.id_marca
                ';
        $fields = ' reserva.*, reserva.estado AS status, v.*,ma.*,mo.*';
                   
        return(new Database('reserva'))->select(' reserva.fk_cliente = '.$fk_cliente, $and, $group, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,self::class);
                                               
    }

}

?>