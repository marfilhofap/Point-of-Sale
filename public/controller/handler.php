<?php
include_once '../autentication/connection.php';
include_once '../../config/parametros_db.php';
include_once 'class.php';
include_once 'get_table.php';

$class = new j_membru(PSQLHOST, PSQLUSER, PSQLPW, PSQLDB);
$get_table = new gestaoTabelas(PSQLHOST, PSQLUSER, PSQLPW, PSQLDB);

// Produtu
if (isset($_POST['aumenta_produtu'])) {
    $naran_produtu = $_POST['naran_produtu'];
    $folin = $_POST['folin'];
    $id_kategoria = $_POST['id'];

    // Anexos
    $binariu = "";
    $naran_img = "";
    $tipu = "";
    $tamanhu = 0;
    if (!empty($_POST['action'])) {
        if ($_POST['action'] == 'haruka' && $_FILES["file"]) {
            if ($_FILES["file"]["error"] > 0) {
                echo "Error: " . $_FILES["file"]["error"] . "<br>";
            } else {
                $img = fopen($_FILES['file']['tmp_name'], 'r') or die("cannot read the file\n");
                $documentos = $_FILES['file']['name'];
                $fahe = explode('.', $documentos);
                $formato = strtolower(end($fahe));
                $naran_img = $_FILES['file']['name'];
                $tipu = $_FILES['file']['type'];
                $tamanhu = $_FILES['file']['size'];
                $data = fread($img, filesize($_FILES['file']['tmp_name']));
                $binariu = pg_escape_bytea($data);
            }
        }
    }


    $insert_status = $class->aumenta_produtu($naran_produtu, $folin, $id_kategoria, $binariu, $naran_img, $tipu, $tamanhu);
}

if (isset($_POST['order_produtu'])) {
    $id_meza = $_POST['id_meza'];
    $id_produtu = $_POST['id_produtu'];
    $tipu_transaksaun = 'Pendente';
    $unidade = $_POST['unidade'];
    $total = 'Pendente';
    $data = $_POST['unidade'];
    $servente = $_SESSION['naran_kompletu'] . ' (' . $_SESSION['id_membru'] . ')';

    // $insert_status = $class->order_produtu($naran_produtu, $folin, $id_kategoria);
}


// Identificacao
if (isset($_POST['aumenta_identidade'])) {
    $naran_kompletu = $_POST['naran_kompletu'];
    $sexo = $_POST['sexo'];
    $id_pozisaun = $_POST['id_pozisaun'];
    $data_moris = $_POST['data_moris'];
    $email = $_POST['email'];
    $nu_telemovel = $_POST['nu_telemovel'];
    $sura_id = $get_table->get_table('identidade_pessoal');
    $konta = count($sura_id) + 1;
    $id_membru = 'LS-' . $konta;

    $insert_status = $class->aumenta_identidade($naran_kompletu, $sexo, $id_pozisaun, $data_moris, $email, $nu_telemovel, $id_membru);
}

if (isset($_POST['ativu_utilijador'])) {
    $id_identidade_pessoal = $_POST['id_identidade_pessoal'];

    $insert_status = $class->ativu_utilijador($id_identidade_pessoal);
    return header("location: ../index.php?c=membru");
}

if (isset($_POST['dejativu_utilijador'])) {
    $id_identidade_pessoal = $_POST['id_identidade_pessoal'];

    $insert_status = $class->dejativu_utilijador($id_identidade_pessoal);
    return header("location: ../index.php?c=membru");
}

// Hamos 

// Identificacao
if (isset($_POST['hamos_identidade'])) {
    $tabela = 'identidade_pessoal';
    $id = 'id_identidade_pessoal';
    $id_dados = $_POST['id_identidade_pessoal'];

    $update_status = $class->delete($tabela, $id, $id_dados);
    return header("location: ../index.php?c=membru");
}
