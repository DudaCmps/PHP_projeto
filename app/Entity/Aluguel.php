<?php 
namespace App\Entity;

use App\Db\Database;
use PDO;


class Aluguel{

    /**
     * Identificador único do aluguel
     * @var int
     */
    public $id_aluguel;

    /**
     * id da reserva
     * @var int
     */
    public $fk_reserva;

    /**
     * data de inicio do aluguel
     * @var string
     */
    public $data_inicio;

    /**
     * data de encerramento do aluguel
     * @var string
     */
    public $data_final;

    /**
     * valor do aluguel
     * @var float
     */
    public $valor;

    /**
     * Método de calculo para o valor do aluguel
     * @return float
     */
    public function calcularValor($categoria){

        
        switch ($categoria) {
            case 'economico':
                $valorTemp = 59.99;
                break;
            
            case 'suv':
                $valorTemp = 100.99;
                break;

            case 'luxo':
                $valorTemp = 500.00;
                break;

            default:
                $valorTemp = 0;
        }

        
        $intervalo = $this->data_inicio->diff($this->data_final);

        $dias = $intervalo->days;
        
        $valor = $valorTemp * $dias;

        return $valor;

    }

    /**
     * Método de cadastro de um aluguel
     * @return boolean
     */
    public function cadastrar(){

        $obDatabase = new Database('aluguel');

        
        $this->id_aluguel = $obDatabase->insert([
                                'fk_reserva'=> $this->fk_reserva,
                                'data_inicio'=> $this->data_inicio->format('Y-m-d H:i:s'),
                                'data_final'=> $this->data_final->format('Y-m-d H:i:s'),
                                'valor'=> $this->valor
                            ]);
                            
        return true;
    }

    /**
     * Método de excluir
     * @return boolean
    */
    public function excluir(){

        return(new Database('aluguel'))->delete('id_aluguel =' .$this->id_aluguel);
    }

    /**
     * Método para obter os alugueis do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getAlugueis($where = null,$group = null, $order = null, $limit = null, $fields = null, $join = null){
        
        $join = ' INNER JOIN reserva re ON re.id_reserva = aluguel.fk_reserva
                  INNER JOIN veiculos ve ON re.fk_carro = ve.id_carro
                  INNER JOIN clientes cl ON re.fk_cliente = cl.id_cliente
                ';
        $fields = 'aluguel.*,
                    cl.*,
                    re.*,
                    ve.*
                   ';
                   
        return(new Database('aluguel'))->select($where, $group, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,self::class);
    }

    /**
     * Método para buscar a reserva pelo id
     * @param integer
     * @return Aluguel
     */
    public static function getAluguel($id_aluguel){
 
        return(new Database('aluguel'))->select('id_aluguel = '.$id_aluguel)
                                               ->fetchObject(self::class);
        
    }


}