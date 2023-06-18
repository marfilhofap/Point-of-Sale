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

    public function edit_produtu($id_produtu, $id_kategoria, $naran_produtu, $folin, $binariu, $naran_img, $tipu, $tamanhu)
    {

        $sql1 = "UPDATE produtu SET naran_produtu = '$naran_produtu', folin='$folin' WHERE id_produtu = '$id_produtu'";

        $this->conn->exec($sql1);

        $sql = "SELECT * from imajem where id_ligasaun = '$id_produtu'";
        $check = $this->conn->prepare($sql);
        $check->execute();
        $resultadu = $check->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultadu) > 0) {
            $sql2 = "UPDATE imajem SET binariu = '$binariu', naran_img='$naran_img', tipu = '$tipu', tamanhu='$tamanhu' WHERE id_ligasaun = '$id_produtu'";

            $this->conn->exec($sql2);
        } else {
            $sql3 = $this->conn->prepare("INSERT INTO imajem (binariu, naran_img, tipu, tamanhu, id_ligasaun) 
                VALUES (:binariu, :naran_img, :tipu, :tamanhu, :id_ligasaun)");
            $sql3->bindParam(":binariu", $binariu);
            $sql3->bindParam(":naran_img", $naran_img);
            $sql3->bindParam(":tipu", $tipu);
            $sql3->bindParam(":tamanhu", $tamanhu);
            $sql3->bindParam(":id_ligasaun", $id_produtu);
            $sql3->execute();
        }



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

    public function troka_password($id_membru, $password_foun, $password_atual)
    {
        $sql = "SELECT * FROM view_utilijador WHERE id_membru='$id_membru' and password='$password_atual' and estadu='Ativu'";
        $check = $this->conn->prepare($sql);
        $check->execute();
        $resultadu = $check->fetchAll(PDO::FETCH_ASSOC);
        $id_utilijador = $resultadu[0]['id_utilijador'];

        if (count($resultadu) > 0) {
            $sql1 = "UPDATE utilijador SET password = '$password_foun' WHERE id_utilijador = '$id_utilijador'";
            $this->conn->exec($sql1);
        }
    }


    // Order Produtu
    public function order_produtu($id_identidade_pessoal, $id_meza, $id_produtu, $tipu_transaksaun, $kuantidade, $total, $oras, $data)
    {
        $sql = $this->conn->prepare("INSERT into transaksaun (id_identidade_pessoal, id_meza, id_produtu, tipu_transaksaun, kuantidade, total, oras_order, data) 
        VALUES (:id_identidade_pessoal, :id_meza, :id_produtu, :tipu_transaksaun, :kuantidade, :total, :oras, :data)");

        $sql->bindParam(":id_identidade_pessoal", $id_identidade_pessoal);
        $sql->bindParam(":id_meza", $id_meza);
        $sql->bindParam(":id_produtu", $id_produtu);
        $sql->bindParam(":tipu_transaksaun", $tipu_transaksaun);
        $sql->bindParam(":kuantidade", $kuantidade);
        $sql->bindParam(":oras", $oras);
        $sql->bindParam(":total", $total);
        $sql->bindParam(":data", $data);

        $sql->execute();
        return header("location: ../index.php?c=order&m=$id_meza");
    }

    // Alterar Order
    public function alterar_order($id, $kuantidade, $total, $id_meza)
    {
        $sql = "UPDATE transaksaun SET kuantidade = '$kuantidade', total = '$total' WHERE id_transaksaun = '$id'";

        $this->conn->exec($sql);

        return header("location: ../index.php?c=pendente&m=$id_meza");
    }

    // Alterar Order
    public function konfirma_order($id_meza)
    {
        $sql = "UPDATE transaksaun SET tipu_transaksaun = 'Prosesa' WHERE id_meza = '$id_meza' and tipu_transaksaun='Pendente'";

        $this->conn->exec($sql);

        return header("location: ../index.php?c=meza_sira");
    }

    // Konfirma Prosesa
    public function konfirma_prosesa($id_meza, $data)
    {
        $sql = "UPDATE transaksaun SET tipu_transaksaun = 'Konsumu' WHERE id_meza = '$id_meza' and tipu_transaksaun='Prosesa' and data='$data'";

        $this->conn->exec($sql);

        return header("location: ../index.php?c=transasaun_sira");
    }

    // SELU
    public function selu_transasaun($id_meza, $oras_selu, $data)
    {

        $sql = "SELECT * from view_order_sira where id_meza='$id_meza' and tipu_transaksaun='Konsumu' and data='$data'";
        $check = $this->conn->prepare($sql);
        $check->execute();
        $resultadu = $check->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultadu) > 0) {
            foreach ($resultadu as $loop) {
                $que = $this->conn->prepare("INSERT into relatorio (naran_kompletu, id_membru, nu_meza, naran_produtu, folin, kuantidade, total, data, oras_tama, oras_selu) 
                        VALUES (:naran_kompletu, :id_membru, :nu_meza, :naran_produtu, :folin, :kuantidade, :total, :data, :oras_tama, :oras_selu)");

                $que->bindParam(":naran_kompletu", $loop['naran_kompletu']);
                $que->bindParam(":id_membru", $loop['id_membru']);
                $que->bindParam(":nu_meza", $loop['nu_meza']);
                $que->bindParam(":naran_produtu", $loop['naran_produtu']);
                $que->bindParam(":folin", $loop['folin']);
                $que->bindParam(":kuantidade", $loop['kuantidade']);
                $que->bindParam(":total", $loop['total']);
                $que->bindParam(":data", $loop['data']);
                $que->bindParam(":oras_tama", $loop['oras_order']);
                $que->bindParam(":oras_selu", $oras_selu);

                $que->execute();

                $this->delete('transaksaun', 'id_transaksaun', $loop['id_transaksaun']);
            }
        } else {
            var_dump('la_susesu');
        }
        return header("location: ../index.php?c=resibu");
    }

    // Gastu kada Loron
    public function aumenta_gastu_kada_loron($osan_sai, $data, $id_identidade_pessoal)
    {

        $sql = "SELECT * from gastu_kada_loron where data='$data'";
        $check = $this->conn->prepare($sql);
        $check->execute();
        $resultadu = $check->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultadu) < 1) {
            $que = $this->conn->prepare("INSERT into gastu_kada_loron (data, total_gastu, id_identidade_pessoal) 
                        VALUES (data, :total_gastu, :id_identidade_pessoal)");

            $que->bindParam(":total_gastu", $osan_sai);
            $que->bindParam(":data", $data);
            $que->bindParam(":id_identidade_pessoal", $id_identidade_pessoal);


            $que->execute();
        } else {
            $sql = "UPDATE gastu_kada_loron SET total_gastu = '$osan_sai' WHERE data = '$data'";

            $this->conn->exec($sql);
        }
        return header("location: ../index.php?c=relatorio_jeral");
    }
}
