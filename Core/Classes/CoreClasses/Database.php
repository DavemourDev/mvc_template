<?php

/**
 * Entidad que representa una conexión a una base de datos.
 *
 * @author David
 */
class Database 
{
    private $dbh, $error, $stmt;
    /**
     * Instancia única del objeto de base de datos.
     * @var Database
     */
    private static $instance=null;
    
    private function __construct() 
    {
        $config = get_config('database');
        
        $dsn = "{$config['dbms']}:host={$config['host']};dbname={$config['database']}";
        
        $options=[
            PDO::ATTR_PERSISTENT=>true,
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        ];
        
        try
        {
            $this->dbh=new PDO($dsn, $config['user'], $config['password'], $options);
        } 
        catch (PDOException $ex) 
        {
            $this->error=$ex->getMessage();
        }
    }
    
    public function query($query)
    {
        $this->stmt=$this->dbh->prepare($query);
    }
    
    public function bind($param, $value, $type=null)
    {
        switch(true)
        {
            case is_int($value):
                $type=PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type=PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type=PDO::PARAM_NULL;
                break;
            default:
                $type=PDO::PARAM_STR;
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    
    public function execute()
    {
        return $this->stmt->execute();
    }
    
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function resultSingle()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
    
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
    
    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }
    
    public function commitTransaction()
    {
        return $this->dbh->commit();
    }
    
    public function rollbackTransaction()
    {
        return $this->dbh->rollBack();
    }
    
    public function debug()
    {
        return $this->stmt->debugDumpParams();
    }
    
    public static function getInstance()
    {
        if(!is_null(self::$instance))
        {
            self::$instance=new Database;
        }
        return self::$instance;
    }
    
}
