<?php

namespace App\Entity;

use App\Db\Database;
use \PDO;

class Fornecedor {

    /** Identificador único
    * @var integer
    */
    public $id;

    /** Nome do fornecedor
    * @var string
    */
    public $name;

    /** CNPJ do fornecedor
    * @var integer
    */
    public $cnpj;

    /** Especialidade do fornecedor
    * @var string(comercio/servico/industria)
    */
    public $specialty;

    /** Método que cadastra fornecedor
    * @var boolean
    */
    public function register() {
        $obDatabase = new Database('fornecedor');
        $this->id = $obDatabase->insert([
            'name' => $this->name,
            'cnpj' => $this->cnpj,
            'specialty' => $this->specialty
        ]);

        return true;
    }

    /** Atualiza fornecedor no banco de dados */
    public function update() {
        return (new Database('fornecedor'))->update('id = '.$this->id,[
            'name' => $this->name,
            'cnpj' => $this->cnpj,
            'specialty' => $this->specialty
        ]);
    }

    /**Exclui fornecedor no banco */
    public function delete() {
        return (new Database('fornecedor'))->delete('id = '.$this->id);
    }

    /** Obtém os fornecedores do banco */
    public static function getFornecedor($where = null, $order = null, $limit = null) {
        return (new Database('fornecedor')) ->select($where, $order, $limit)
                                            ->fetchAll(PDO::FETCH_CLASS, self::class);
                            
    }

    /**Busca o fornecedor pelo ID */
    public static function getFornecedores($id) {
        return (new Database('fornecedor')) ->select('id = '.$id)
                                            ->fetchObject((self::class));
    }
}