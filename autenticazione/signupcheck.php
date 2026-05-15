<?php
session_start();
require_once "../include/dbHandler.php";

$pdo = DBHandler::getPDO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome        = htmlspecialchars(trim($_POST["nome"]));
    $cognome     = htmlspecialchars(trim($_POST["cognome"]));
    $email       = htmlspecialchars(trim($_POST["email"]));
    $password    = $_POST["password"];
    $cap         = htmlspecialchars(trim($_POST["cap"]));
    $datanascita = $_POST["datanascita"];
    $provincia   = htmlspecialchars(trim($_POST["provincia"]));

    $sql = "INSERT INTO UTENTE 
            (Nome, Cognome, Email, Password, CAP, DataNascita, Provincia, Ruolo)
            VALUES
            (:nome, :cognome, :email, :password, :cap, :datanascita, :provincia, 'cliente')";

    $sth = $pdo->prepare($sql);
    $sth->execute([
        ":nome"        => $nome,
        ":cognome"     => $cognome,
        ":email"       => $email,
        ":password"    => $password,
        ":cap"         => $cap,
        ":datanascita" => $datanascita,
        ":provincia"   => $provincia
    ]);

    header("Location: login.php");
    exit();
}
?>