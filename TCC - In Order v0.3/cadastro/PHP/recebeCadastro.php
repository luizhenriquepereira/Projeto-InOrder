<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../CSS/recebeCadastro.css">
    <title>Recebe Cadastro</title>
</head>
<body>


<?php

    include 'conexao.php';


    $user = $_POST['txtuser'];//variavel nome recebe o valor do campo texto atraves da propiedade name
    $cpf = $_POST['txtcpf'];
    $senha = $_POST['txtpassword'];
    $email = $_POST['txtemail'];
    $telefone = $_POST['tel'];
    $nome = $_POST['txtempresa'];
    $cnpj = $_POST['txtcnpj'];  



    echo "

<section>

<h1> Os dados inseridos foram:</h1>
    <p>
    Nome: $user
    <br>
    <br>
    CPF: $cpf
    <br>
    <br>
    Telefone: $senha
    <br>
    <br>
    Email: $email
    <br>
    <br>
    telefone: $telefone 
    <br>
    <br>
    nome: $nome
    <br>
    <br>
    cnpj: $cnpj
    </p>

</section>


    ";

$inserirEmp = "insert into EMPRESA(NOME_FANTASIA, CNPJ_EMPRESA) values('$nome', '$cnpj' )";

$inserir = " insert into GERENTE(NOME_GERENTE, EMAIL_GERENTE, SENHA_GERENTE, CPF_GERENTE, TELEFONE_GERENTE) values('$user', '$email', '$senha', '$cpf', '$telefone')";

   //echo "<br>$inserir<br>";

   mysqli_query($conn,$inserirEmp);

   mysqli_query($conn,$inserir);


    echo "Registro cadastrado com sucesso!";

    header("refresh: 5; url=../HTML/login.html");
   // header("Refresh: 5; url=../HTML/login.html");
?>


</body>
</html>