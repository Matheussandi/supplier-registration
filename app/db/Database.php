<?php

namespace App\Db;

use \PDO;
use PDOException;

class Database {

    const HOST = 'localhost';
    const DATABASE = 'supplierregistration';
    const USER = 'root';
    const PASSWORD = '';

    private $table;
    private $connection;

    /** Define a tabela e intância a conexão
     * @var string
     */
    public function __construct($table = null)
    {
        $this->table = $table;
        $this->setConnection();
    }

    /** Cria a conexão com banco de dados
     */
    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::DATABASE,self::USER,self::PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /**
     * Executa queries dentro do banco de dados
     */
    public function execute($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die('ERROR: '.$e->getMessage());
        }
    }

    /** Insere dados no banco
     */
    public function insert($values) {
        // Dados da query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        // Monta query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        // Executa o insert
        $this->execute($query, array_values($values));

        // Retorna o ID
        return $this->connection->lastInsertId();
    }

    /** Realiza uma consulta no banco */
    public function select($where = null, $order = null, $limit = null, $fields = '*') {
        // Dados da query
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT  '.$limit : '';

        // Monta query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$where.' '.$order.' '.$limit;

        return $this->execute($query);
    }

    /** Modifica os dados */
    public function update($where, $values) {
        $fields = array_keys($values);

        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        $this->execute($query, array_values($values));

        return true;
    }

    /** Remove os dados */
    public function delete($where) {
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        $this->execute($query);

        return true;
    }
}
