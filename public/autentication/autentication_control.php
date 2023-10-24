<?php
include_once 'connection.php';
// include_once '../../config/parametros_db.php';
include_once '/xampp/htdocs/Point-of-Sale/config/parametros_db.php';

class ControloAutenticacao
{
    public $conn = null;
    public $PSQLHOST;
    public $PSQLUSER;
    public $PSQLDB;
    public $PSQLPW;
    public function __construct($PSQLHOST, $PSQLUSER, $PSQLPW, $PSQLDB)
    {
        $conec = new connection($PSQLHOST, $PSQLUSER, $PSQLPW, $PSQLDB);
        $this->conn = $conec->open();
        $this->PSQLHOST = $PSQLHOST;
        $this->PSQLUSER = $PSQLUSER;
        $this->PSQLPW = $PSQLPW;
        $this->PSQLDB = $PSQLDB;
    }

    public function login($username, $password)
    {
        try {
            $sql = "SELECT id_utilijador FROM utilijador
            inner join identidade_pessoal using (id_identidade_pessoal)
            WHERE id_membru = :username AND password=:password AND estadu='Ativu'";

            $query = $this->conn->prepare($sql);
            $query->bindParam(":username", $username, PDO::PARAM_STR);
            $query->bindParam(":password", $password, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
                $usuario = $query->fetch(PDO::FETCH_OBJ);
                $data_atual = date("Y-m-d H:i:s");
                $atual = strtotime($data_atual);
                $id = $usuario->id_utilijador;

                return $id;
            };
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function controlo_jestaun_sira($id_pozisaun)
    {
        $sql = "SELECT * FROM nivel_asesu WHERE id_pozisaun = '$id_pozisaun'";
        $query = $this->conn->prepare($sql);
        $query->execute();
        $users = $query->fetchAll();
        return $users;
    }

    public function image_cache($id_ligasaun)
    { 
        $imajem = md5($id_ligasaun) . '.jpg';
        if (!file_exists('cache/' . $imajem)) {

            $con = pg_connect("host=$this->PSQLHOST dbname=$this->PSQLDB  user=$this->PSQLUSER  password=$this->PSQLPW")
                or die("Could not connect to server\n");

            $query = "SELECT binariu FROM imajem where id_ligasaun = '$id_ligasaun'";
            $res = pg_query($con, $query) or die(pg_last_error($con));
            $arquivo = pg_fetch_array($res, null, PGSQL_ASSOC);

            if (empty($arquivo)) {
                $target = 'cache/imajem_seluk.jpg';
                // $link = 'cache/' . $imajem;
                // symlink($target, $link);
                echo '<img src="'. $target . '" alt="Imajem" style="width: 100px;">';
            } else {
                $foto = $arquivo["binariu"];
                $a = pg_unescape_bytea($foto);
                $foto_name = $id_ligasaun;
                $b = md5($foto_name) . '.jpg';
                $file_name = "cache/" . $b;
                $img = fopen($file_name, 'wb') or die("cannot open image\n");
                $abc = fwrite($img, $a) or die("cannot write image data\n");
                fclose($img);
                echo '<img class="img-profile" src="cache/' . $b . '" alt="Foto" style="width: 100px;">';
            }
        } else {
            echo '<img class="img-profile" src="cache/' . $imajem . '" alt="Foto" style="width: 100px;">';
        }
    }

    public function profile_cache($id_ligasaun)
    {
        $imajem = md5($id_ligasaun) . '.jpg';
        if (!file_exists('cache/' . $imajem)) {

            $con = pg_connect("host=$this->PSQLHOST dbname=$this->PSQLDB  user=$this->PSQLUSER  password=$this->PSQLPW")
                or die("Could not connect to server\n");

            $query = "SELECT binariu FROM imajem where id_ligasaun = '$id_ligasaun'";
            $res = pg_query($con, $query) or die(pg_last_error($con));
            $arquivo = pg_fetch_array($res, null, PGSQL_ASSOC);

            if (empty($arquivo)) {
                $target = 'cache/Profile.png';
                echo '<img width="42" class="rounded-circle" src="' . $target . '" alt="Foto Profile">';
            } else {
                $foto = $arquivo["binariu"];
                $a = pg_unescape_bytea($foto);
                $foto_name = $id_ligasaun;
                $b = md5($foto_name) . '.jpg';
                $file_name = "cache/" . $b;
                $img = fopen($file_name, 'wb') or die("cannot open image\n");
                $abc = fwrite($img, $a) or die("cannot write image data\n");
                fclose($img);
                echo '<img width="42" class="rounded-circle" src="cache/' . $b . '" alt="Foto Profile">';
            }
        } else {
            echo '<img width="42" class="rounded-circle" src="cache/' . $imajem . '" alt="Foto Profile">';
        }
    }
}
