<?php 

//Aqui fica a conexão com o banco de dados principal

class Database {


    protected const SERVIDOR = "localhost";
    protected const USUARIO = "root";
    protected const SENHA = "";
    protected const DB = "moviestar";

    public function __construct(protected $db){

        try{
            $this->db = new PDO('mysql:host='.self::SERVIDOR.';dbname='.self::DB.'', self::USUARIO, self::SENHA);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){

            echo 'ERRO: ' . $e->getMessage();
        }

    }
}

?>