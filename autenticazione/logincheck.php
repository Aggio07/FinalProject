<?php
session_start();
require_once("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email    = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM UTENTE WHERE Email = :email AND Password = :password";
    $sth = $conn->prepare($sql);
    $sth->execute([
        ":email"    => $email,
        ":password" => $password
    ]);

    $utente = $sth->fetch(PDO::FETCH_ASSOC);

    if ($utente) {

        $_SESSION["idUtente"] = $utente["IdUtente"];
        $_SESSION["nome"]     = $utente["Nome"];
        $_SESSION["ruolo"]    = $utente["Ruolo"];

        if ($utente["Ruolo"] === "admin") {
            header("Location: ../paginephp/statistiche.php");
        } else {
            header("Location: ../index.php");
        }
        exit();

    } else {
        header("Location: login.php?errore=1");
        exit();
    }
}
?>