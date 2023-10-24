<?php
include_once '../autentication/connection.php';
include_once '../../config/parametros_db.php';
include_once 'class.php';
include_once 'get_table.php';

if (!isset($_SESSION)) {
    session_start();
}

$class = new j_membru(PSQLHOST, PSQLUSER, PSQLPW, PSQLDB);
$get_table = new gestaoTabelas(PSQLHOST, PSQLUSER, PSQLPW, PSQLDB);

$dt = new DateTime("now", new DateTimeZone('Asia/Dili'));

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
if (isset($_POST['edit_produtu'])) {
    $id_produtu = $_POST['id_produtu'];
    $id_kategoria = $_POST['id_kategoria'];
    $naran_produtu = $_POST['naran_produtu'];
    $folin = $_POST['folin'];

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
 
    $edit_status = $class->edit_produtu($id_produtu, $id_kategoria, $naran_produtu, $folin, $binariu, $naran_img, $tipu, $tamanhu);
}

if (isset($_POST['delete_produtu'])) {
    $tabela = 'produtu';
    $id = 'id_produtu';
    $id_dados = $_POST['id_produtu'];
    $id_cat = $_POST['id_kategoria'];

    $update_status = $class->delete($tabela, $id, $id_dados);

    $tabela1 = 'imajem';
    $id1 = 'id_ligasaun';
    $id_dados1 = $_POST['id_produtu'];

    $delete_status = $class->delete($tabela1, $id1, $id_dados1);

    // imajem
    return header("location: ../index.php?c=produtu_sira&id=$id_cat");
}

// Utilijador
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

if (isset($_POST['edit_identidade'])) {
    $id_identidade_pessoal = $_POST['id_identidade_pessoal'];
    $naran_kompletu = $_POST['naran_kompletu'];
    $sexo = $_POST['sexo'];
    $data_moris = $_POST['data_moris'];
    $email = $_POST['email'];
    $nu_telemovel = $_POST['nu_telemovel'];
    $id_pozisaun = $_POST['id_pozisaun'];

    $insert_status = $class->edit_identidade($id_identidade_pessoal, $naran_kompletu, $sexo, $data_moris, $email, $nu_telemovel, $id_pozisaun);
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

if (isset($_POST['delete_identidade'])) {
    $tabela = 'utilijador';
    $id = 'id_identidade_pessoal';
    $id_dados = $_POST['id_identidade_pessoal'];
    $update_status = $class->delete($tabela, $id, $id_dados);
    
    $tabela = 'identidade_pessoal';
    $id = 'id_identidade_pessoal';
    $id_dados = $_POST['id_identidade_pessoal'];
    $update_status = $class->delete($tabela, $id, $id_dados);

    return header("location: ../index.php?c=membru");
}

if (isset($_POST['edit_profile'])) {
    $id_identidade_pessoal = $_POST['id_identidade_pessoal'];
    $naran_kompletu = $_POST['naran_kompletu'];
    $sexo = $_POST['sexo'];
    $data_moris = $_POST['data_moris'];
    $email = $_POST['email'];
    $nu_telemovel = $_POST['nu_telemovel'];

    $insert_status = $class->edit_profile($id_identidade_pessoal, $naran_kompletu, $sexo, $data_moris, $email, $nu_telemovel);
}

if(isset($_POST['troka_password'])){
    $id_membru = $_SESSION['id_membru'];
    $password_foun = md5($_POST['password_foun']);
    $password_atual = md5($_POST['password_atual']);
    $konf_password = md5($_POST['konf_password']);

    if($password_foun == $konf_password){
    $insert_status = $class->troka_password($id_membru, $password_foun, $password_atual);
    } else {
        return header("location: ../index.php?c=profile&r=3");
    }
}



// Order Produtu
if (isset($_POST['order_produtu'])) {
    $id_identidade_pessoal = $_POST['id_identidade_pessoal'];
    $id_meza = $_POST['id_meza'];
    $id_produtu = $_POST['id_produtu'];
    $tipu_transaksaun = 'Pendente';
    $kuantidade = $_POST['kuantidade'];
    $total = $_POST['kuantidade']*$_POST['folin'];
    $oras = $dt->format('H:i:s');
    $data = $dt->format('Y-m-d');

    $insert_status = $class->order_produtu($id_identidade_pessoal, $id_meza, $id_produtu, $tipu_transaksaun, $kuantidade, $total, $oras, $data);
}

// Alterar Order
if (isset($_POST['alterar_order'])) {
    $id = $_POST['id_transaksaun'];
    $kuantidade = $_POST['kuantidade'];
    $total = $_POST['kuantidade']*$_POST['folin'];
    $id_meza = $_POST['id_meza'];

    $insert_status = $class->alterar_order($id, $kuantidade, $total, $id_meza);
}

// Kanselar Order
if (isset($_POST['kansela_order'])) {
    $tabela = 'transaksaun';
    $id = 'id_transaksaun';
    $id_dados = $_POST['id_transaksaun'];
    $id_meza = $_POST['id_meza'];

    $update_status = $class->delete($tabela, $id, $id_dados);
    return header("location: ../index.php?c=pendente&m=$id_meza");
}

// Alterar Order
if (isset($_POST['konfirma_order'])) {
    $id_meza = $_POST['id_meza'];

    $insert_status = $class->konfirma_order($id_meza);
}

// Konfirma Prosesa
if (isset($_POST['konfirma_prosesa'])) {
    $id_meza = $_POST['id_meza'];
    $data = $dt->format('Y-m-d');

    $insert_status = $class->konfirma_prosesa($id_meza, $data);
}

// Konfirma Konsumu
if (isset($_POST['selu_transasaun'])) {
    // var_dump($_POST);
    $id_meza = $_POST['id_meza'];
    $data = $dt->format('Y-m-d');
    $oras_selu = $dt->format('H:i:s');

    $insert_status = $class->selu_transasaun($id_meza, $oras_selu, $data);
}

// Gastu kada Loron
if (isset($_POST['aumenta_gastu_kada_loron'])) {
    $osan_sai = $_POST['osan_sai'];
    $data = $_POST['data'];
    $id_identidade_pessoal = $_POST['id_identidade_pessoal'];

    $insert_status = $class->aumenta_gastu_kada_loron($osan_sai, $data, $id_identidade_pessoal);
    return header("location: ../index.php?c=relatorio_jeral");
}

if (isset($_POST['aumenta_gastu_kada_loron_2'])) {
    $osan_sai = $_POST['osan_sai'];
    $data = $_POST['data'];
    $mes = date('m', strtotime($data));
    $ano = date('Y', strtotime($data));
    $id_identidade_pessoal = $_POST['id_identidade_pessoal'];

    $insert_status = $class->aumenta_gastu_kada_loron($osan_sai, $data, $id_identidade_pessoal);
    return header("location: ../index.php?c=relatorio_diaria_por_mensal&mes=$mes&ano=$ano");
}

// Aumenta Meza
if (isset($_POST['aumenta_meza'])) {
    $nu_meza = $_POST['nu_meza'];

    $insert_status = $class->aumenta_meza($nu_meza);
}

if (isset($_POST['edit_meza'])) {
    $id_meza = $_POST['id_meza'];
    $nu_meza = $_POST['nu_meza'];

    $insert_status = $class->edit_meza($id_meza, $nu_meza);
}

if (isset($_POST['delete_meza'])) {
    $tabela = 'meza';
    $id = 'id_meza';
    $id_dados = $_POST['id_meza'];

    $update_status = $class->delete($tabela, $id, $id_dados);
    return header("location: ../index.php?c=meza_mamuk");
} 