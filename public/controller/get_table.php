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
            } else if (empty($criteria) && empty($cond)) {
                $sql = "SELECT $column FROM $table_name $mais_cond";
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

    function Mes($nu_mes)
    {
        switch ($nu_mes) {
            case 1:
                return 'Janeiro';
            case 2:
                return 'Fevereiro';
            case 3:
                return 'Março';
            case 4:
                return 'Abril';
            case 5:
                return 'Maio';
            case 6:
                return 'Junho';
            case 7:
                return 'Julho';
            case 8:
                return 'Agosto';
            case 9:
                return 'Setembro';
            case 10:
                return 'Outubro';
            case 11:
                return 'Novembro';
            case 12:
                return 'Dezembro';
            default:
                return 'Mes Invalido';
        }
    }
}
