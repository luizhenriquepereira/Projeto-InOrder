<?php

    $server = "localhost";
    $user = "root";
    //$password = "Seemg@123";
    $password = "";
    $db = "inorder_database";

      $conn =   mysqli_connect($server, $user, $password, $db);

        $testeConexao = "Conexão realizada com sucesso!";

        //echo" $testeConexao";

?>