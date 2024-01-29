<?php

class ConnexionPostgreSQL {

    private $host = "uss-mtf.ddns.net";
    private $port = "5798";
    private $dbname = "leak";
    private $user = "spock";
    private $password = "P00sTGr3sQQl##";
    private $pdo;

    public function connect() {
        $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname};";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Aucune connexion à PG: " . $e->getMessage());
        }

        return $this->pdo;
    }
    public function disconnect() {
        $this->pdo = null;
    }
}
$connexion = new ConnexionPostgreSQL();
$PG = $connexion->connect();

?>