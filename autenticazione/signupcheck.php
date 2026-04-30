<?php
session_start();
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cap = $_POST["cap"];
    $datanascita = $_POST["datanascita"];
    $provincia = $_POST["provincia"];

    try {

        $sql = "INSERT INTO UTENTE 
        (Nome, Cognome, Email, Password, CAP, DataNascita, Provincia, Ruolo)
        VALUES
        (:nome, :cognome, :email, :password, :cap, :datanascita, :provincia, 'cliente')";

        $sth = $conn->prepare($sql);

        $sth->execute([
            ":nome" => $nome,
            ":cognome" => $cognome,
            ":email" => $email,
            ":password" => $password,
            ":cap" => $cap,
            ":datanascita" => $datanascita,
            ":provincia" => $provincia
        ]);

        header("Location: login.php");
        exit();

    } catch (PDOException $e) {

        echo "Errore nella registrazione";

    }
}
?>