<?php
session_start();

$lifetime = strtotime('+1 minutes', 0);
session_set_cookie_params($lifetime);

if (isset($_GET['useremail'])) {
    $userEmail = $_GET['useremail'];
}

if (isset($_GET['usersenha'])) {
    $userSenha = $_GET['usersenha'];
}

$_SESSION['email'] = $userEmail;
$_SESSION['senha'] = $userSenha;

if (empty($_SESSION['email'])) {
    unset ($_SESSION['email']);
    unset ($_SESSION['senha']);
    header('location:index.php');
}

?>