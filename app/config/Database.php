<?php

namespace App\Config;

use PDO;
use App\Core\Response;

class Database
{
    public $statement;

    public $connection;

    /**
     * PDO connection
     * 
     * @param array{
     *     database: array{
     *         host: string,
     *         port: int,
     *         dbname: string,
     *         charset: string
     *     }
     * } $config  db connection
     * @param string $username db username
     * @param string $password db user password
     */
    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    /**
     * DB query
     * 
     * @param string $query sql query, 'select * from table'
     * @param array $params params used in query
     * 
     * @return self 
     */
    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    /**
     * @return array|false array if there was a result, or false if no result
     */
    public function find(): mixed
    {
        return $this->statement->fetch();
    }

    /**
     * @return array|false
     */
    public function findAll()
    {
        return $this->statement->fetchAll();
    }

    /**
     * @return array
     */
    public function findAllOrFail(): array
    {
        $result = $this->findAll();
        if (!$result) {
            abort(Response::NOT_FOUND);
        }

        return $result;
    }

    /**
     * @return mixed
     */
    public function findOrFail(): mixed
    {
        $result = $this->find();
        if (!$result) {
            abort(Response::NOT_FOUND);
        }
        
        return $result;
    }


}