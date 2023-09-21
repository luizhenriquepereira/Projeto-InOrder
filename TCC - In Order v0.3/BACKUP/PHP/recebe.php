<?php

    $email = $_POST[email];
    $name = $_POST[user];
    $password = $_POST[password];
    $passwordConfirm = $_POST[passwordConfirm];

    header("Location: ../HTML/cadastro2.html");
    
?>