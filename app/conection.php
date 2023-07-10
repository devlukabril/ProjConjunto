<?php
class Database {
    protected $db;

    protected const SERVIDOR = "localhost";
    protected const USUARIO = "root";
    protected const SENHA = "";
    protected const DB = "moviestar";

    public function __construct($db){
        try {
            $this->db = new PDO('mysql:host='.self::SERVIDOR.';dbname='.self::DB.'', self::USUARIO, self::SENHA);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'ERRO: ' . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->db;
    }

    public function getDb(){
        return $this->db;
    }


}

?>
