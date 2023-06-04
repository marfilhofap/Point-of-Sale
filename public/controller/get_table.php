<?php 

class gestaoTabelas
{
    protected $conn = null;
    public  $PSQLHOST;
    public  $PSQLUSER;
    public  $PSQLDB;
    public $PSQLPW;
    public function __construct($PSQLHOST, $PSQLUSER, $PSQLPW, $PSQLDB)
    {
        $con = new connection($PSQLHOST, $PSQLUSER, $PSQLPW, $PSQLDB);
        $this->conn = $con->open();
    }

    //  Mostrar dadus husi tabela base de dadus sira
    public function get_table($table_name)
    {
        try {
            $sql = "SELECT *  FROM  $table_name";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
    public function get_table_uuid($column, $table_name, $criteria, $cond, $mais_cond)
    {
        try {
            if (empty($column)) {
                $sql = "SELECT * FROM $table_name WHERE $criteria = '$cond'  $mais_cond";
            } else {
                $sql = "SELECT $column FROM $table_name WHERE $criteria = '$cond' $mais_cond";
            }
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
}
