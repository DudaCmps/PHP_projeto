<?php 

namespace App\Entity;

use App\Db\Database;
use PDO;

class Usuario{

    /**
     * Identificador único do usuario
     * @var int
     */
    public $id_user;

    /**
     * Nome completo do usuario
     * @var string
     */
    public $nome;

    /**
     * Email do usuario
     * @var string
     */
    public $email;

    /**
     * Senha do usuario
     * @var string
     */
    public $senha;

    /**
     * CPF do usuario
     * @var string
     */
    public $cpf;

    /**
     * Data de nascimento do usuario
     * @var string (formato YYYY-MM-DD)
     */
    public $data_nasc;

    /**
     * Número de telefone do usuario
     * @var integer
     */
    public $telefone;

    /**
     * usuario ativo
     * @var integer
     */
    public $ativo_usuario;

    /**
     * Tipo de perfil
     * @var string
     */
    public $perfil;

    /**
     * Método de cadastro de um usuario no banco
     * @return boolean
     */
    public function cadastrar(){

        $obDatabase = new Database('usuarios');
        $this->id_user = $obDatabase->insert([
                                'nome'=> $this->nome,
                                'email'=> $this->email,
                                'senha'=> $this->senha,
                                'cpf'=> $this->cpf,
                                'data_nasc'=> $this->data_nasc,
                                'telefone'=> $this->telefone,
                                'perfil'=> $this->perfil
                            ]);     
        return true;
    }

    /**
     * Método de atualizar dados 
     * @return boolean
     */
    public function atualizar(){
        return(new Database('usuarios'))->update('id_user ='.$this->id_user, [
                                'nome'=> $this->nome,
                                'cpf'=> $this->cpf,
                                'data_nasc'=> $this->data_nasc,
                                'telefone'=> $this->telefone
                            ]);
        
    }

    /**
     * Método de excluir
     * @return boolean
     */
    public function excluir(){

        return(new Database('usuarios'))->delete('id_user =' .$this->id_user);
        
    }

    /**
     * Método para obter as vagas do banco para listagem
     * @param string
     * @param string
     * @param string
     * @return array
     */
    public static function getUsuarios($where = null,$group = null, $order = null, $limit = null, $fields = null, $join = null){
        
       
        $fields = 'usuarios.id_user,
                   usuarios.nome,
                   usuarios.cpf,
                   usuarios.data_nasc,
                   usuarios.telefone
                   ';
                   
        return(new Database('usuarios'))->select($where,$group, $order, $fields, $limit, $join)
                                               ->fetchAll(PDO::FETCH_CLASS,self::class);
                                               
    }

    /**
     * Método para buscar o usuario pelo id
     * @param integer
     * @return Usuario
     */
    public static function getUsuario($id_user){
 
        return(new Database('usuarios'))->select('id_user = '.$id_user)
                                               ->fetchObject(self::class);
        
    }

     /**
     * Método para buscar o usuario pelo email
     * @param integer
     * @return Usuario
     */
    public static function getUsuarioEmail($email){
        
        $where = "email = '" . addslashes($email) . "'";
        
        return(new Database('usuarios'))->select($where)
                                               ->fetchObject(self::class);
        
    }
}

?>