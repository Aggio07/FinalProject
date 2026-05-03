<?php
session_start();
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome        = htmlspecialchars(trim($_POST["nome"]));
    $cognome     = htmlspecialchars(trim($_POST["cognome"]));
    $email       = htmlspecialchars(trim($_POST["email"]));
    $password    = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $cap         = htmlspecialchars(trim($_POST["cap"]));
    $datanascita = $_POST["datanascita"];
    $provincia   = htmlspecialchars(trim($_POST["provincia"]));

    try {
        $sql = "INSERT INTO UTENTE 
                (Nome, Cognome, Email, Password, CAP, DataNascita, Provincia, Ruolo)
                VALUES
                (:nome, :cognome, :email, :password, :cap, :datanascita, :provincia, 'cliente')";

        $sth = $conn->prepare($sql);
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

    } catch (PDOException $e) {
        header("Location: signup.php?errore=1");
        exit();
    }
}
?>