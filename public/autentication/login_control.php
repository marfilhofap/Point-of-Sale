<?php
session_start();

include_once 'autentication_control.php';
include_once '../controller/get_table.php';
$auth = new ControloAutenticacao(PSQLHOST, PSQLUSER, PSQLPW, PSQLDB);
$get_table = new gestaoTabelas(PSQLHOST, PSQLUSER, PSQLPW, PSQLDB);

if (isset($_POST['login_sistema'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "") {
        $login_error_message = 'Favor Ida hatama User Name!';
        header('Location: ../login.php?err=1');
    } elseif ($password == "") { 
        $login_error_message = 'Favor Ida hatama Password!';
        header('Location: ../login.php?err=2');
    } else {
        $id_usuario = $auth->login($username, md5($password)); // check user login
        if ($id_usuario != null) {
            // Set Nia Permisaun no SESSION tuir nia user 

            $dados = $get_table->get_table_uuid('', 'view_identidade_pessoal', 'id_membru', $username, 'limit 1');
            $utilijador = $get_table->get_table_uuid('', 'utilijador', 'id_identidade_pessoal', $dados[0]['id_identidade_pessoal'], '');

            $_SESSION['id_membru'] = $username;
            $_SESSION['id_utilijador'] = $utilijador[0]['id_utilijador'];
            $_SESSION['id_identidade_pessoal'] = $dados[0]['id_identidade_pessoal'];

            $naran = $dados[0]['naran_kompletu'];
            $parts = explode(' ', $naran);
            $first_name = $parts[0];
            $last_name = $parts[count($parts) - 1];
            $middle_initials = '';
            for ($i = 1; $i < count($parts) - 1; $i++) {
                $middle_initials .= substr($parts[$i], 0, 1) . '. ';
            }
            $full_name = $first_name . ' ' . $middle_initials . $last_name;
            $_SESSION['naran_kompletu'] = $full_name;
            $_SESSION['id_pozisaun'] = $dados[0]['id_pozisaun'];
            $_SESSION['pozisaun'] = $dados[0]['pozisaun'];

            header('Location: ../index.php'); // Redirect user ba Index page
        } else {
            session_unset();
            session_destroy();
            header('Location: ../login.php?err=3');
        }
    }
}
