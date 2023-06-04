<?php
class j_membru
{
    protected $conn = null;
    protected $db_pgconnect = null;
    public  $PSQLHOST;
    public  $PSQLUSER;
    public  $PSQLDB;
    public $PSQLPW;
    public function __construct($PSQLHOST, $PSQLUSER, $PSQLPW, $PSQLDB)
    {
        $con = new connection($PSQLHOST, $PSQLUSER, $PSQLPW, $PSQLDB);
        $this->conn = $con->open();
        $this->db_pgconnect = $con->open_pgconnect();
    }

    //  Hamos dadus husi tabela base de dadus sira
    public function delete($table_name, $id, $id_dados)
    {
        try {
            $sql = "DELETE FROM $table_name WHERE $id='$id_dados'";
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    // Produtu
    public function aumenta_produtu($naran_produtu, $folin, $id_kategoria, $binariu, $naran_img, $tipu, $tamanhu)
    {
        $sql = $this->conn->prepare("INSERT INTO produtu (naran_produtu, folin, id_kategoria, estadu) 
        VALUES (:naran_produtu, :folin, :id_kategoria, 'Prontu') RETURNING id_produtu");
        $sql->bindParam(":naran_produtu", $naran_produtu);
        $sql->bindParam(":folin", $folin);
        $sql->bindParam(":id_kategoria", $id_kategoria);
        $sql->execute();

        $id_produtu = $sql->fetchColumn();

        $sql2 = $this->conn->prepare("INSERT INTO imajem (binariu, naran_img, tipu, tamanhu, id_ligasaun) 
        VALUES (:binariu, :naran_img, :tipu, :tamanhu, :id_ligasaun)");
        $sql2->bindParam(":binariu", $binariu);
        $sql2->bindParam(":naran_img", $naran_img);
        $sql2->bindParam(":tipu", $tipu);
        $sql2->bindParam(":tamanhu", $tamanhu);
        $sql2->bindParam(":id_ligasaun", $id_produtu);
        $sql2->execute();

        return header("location: ../index.php?c=produtu_sira&id=$id_kategoria");
    }


    // Identificacao
    public function aumenta_identidade($naran_kompletu, $sexo, $id_pozisaun, $data_moris, $email, $nu_telemovel, $id_membru)
    {
        $sql = $this->conn->prepare("CALL aumenta_identidade_pessoal (:naran_kompletu, :sexo, :id_pozisaun, :data_moris, :email, :nu_telemovel, :id_membru)");
        $sql->bindParam(":naran_kompletu", $naran_kompletu);
        $sql->bindParam(":sexo", $sexo);
        $sql->bindParam(":id_pozisaun", $id_pozisaun);
        $sql->bindParam(":data_moris", $data_moris);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":nu_telemovel", $nu_telemovel);
        $sql->bindParam(":id_membru", $id_membru);

        $sql->execute();
        return header("location: ../index.php?c=membru");
    }

    public function ativu_utilijador($id_identidade_pessoal)
    {
        $sql = "UPDATE utilijador SET estadu = 'Ativu' WHERE id_identidade_pessoal = '$id_identidade_pessoal'";

        $this->conn->exec($sql);
    }

    public function dejativu_utilijador($id_identidade_pessoal)
    {
        $sql = "UPDATE utilijador SET estadu = 'La Ativu' WHERE id_identidade_pessoal = '$id_identidade_pessoal'";

        $this->conn->exec($sql);
    }
}
