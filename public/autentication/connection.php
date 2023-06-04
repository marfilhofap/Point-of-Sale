<?php
class connection
{
    public $PSQLHOST;
    public $PSQLUSER;
    public $PSQLDB;
    public $PSQLPW;

    function __construct($PSQLHOST, $PSQLUSER, $PSQLPW, $PSQLDB)
    {
        // PSQLHOST, PSQLUSER, PSQLPW, PSQLDB
        $this->PSQLHOST = $PSQLHOST;
        $this->PSQLUSER = $PSQLUSER;
        $this->PSQLDB = $PSQLDB;
        $this->PSQLPW = $PSQLPW;
    }


    public function open()
    {
        $pdo = null;
        try {

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $dsn = "pgsql:host=$this->PSQLHOST;port=5432;dbname=$this->PSQLDB;";
            // make a database connection
            $pdo = new PDO($dsn, $this->PSQLUSER, $this->PSQLPW, $options);
            return $pdo;
        } catch (PDOException $e) {
            return "Falha em conecção : " . $e->getMessage();
        }
    }

    public function open_pgconnect()
    {

        $con = pg_connect("host=$this->PSQLHOST port=5432 dbname=$this->PSQLDB user=$this->PSQLUSER password=$this->PSQLPW")
            or die("Falha em connecção\n");
        return $con;
    }
}
