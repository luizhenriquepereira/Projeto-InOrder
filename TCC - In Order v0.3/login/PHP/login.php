<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../CSS/login.css">
    <link rel="shortcut icon" href="../IMAGENS/icon.png" type="image/x-icon">

    <title>InOrder - Entrando</title>
</head>
<body>	

<?php

// começar ou retomar uma sessão
session_start();
 
// se vier um pedido para login
if (isset($_POST['envia'])) {
 
	// estabelecer ligação com a base de dados
    include 'conexao.php';

 
	// receber o pedido de login com segurança
	$cpf = mysqli_real_escape_string($conn, $_POST['txtuser']);
	$password = mysqli_real_escape_string($conn, $_POST['txtpassword']);


//echo "$cpf <br> <br>";
//echo "$password";



 
	// verificar o utilizador em questão (pretendemos obter uma única linha de registos)
	$query = "SELECT CPF_GERENTE, SENHA_GERENTE FROM GERENTE WHERE CPF_GERENTE = '$cpf' AND SENHA_GERENTE = '$password'";
    $login = mysqli_query($conn, $query);


    $row = mysqli_num_rows($login);
 
	if ($row == 1) {
 
		// o utilizador está correctamente validado
		// guardamos as suas informações numa sessão
		$_SESSION['CPF_GERENTE'] = $cpf;
		$_SESSION['SENHA_GERENTE'] = $password;
		


		echo "

		<section class='testBox'>
	
			<h1>Entrando</h1>
			<div class='spinner'></div>

			<p>Por favor, espere alguns segundos...</p>

		</section>
		";

		header("refresh: 3; url=../HTML/cardapio.html");

	} 
    else {
 
		// falhou o login

		echo "
		
		<section class='testBox'>
		
	
		<div id='bloco1'>
		<h1>Entrando</h1>
		
        <div class='spinner'></div>

		<p>Por favor, espere alguns segundos...</p>


		</div>


		<div id='bloco2'>

		<h1>Usuário ou senha inválidos</h1>

		<span class='material-symbols-rounded' id='close'>
		close
		</span>


		 <a href='../HTML/login.html'><p id='testLink'>Tente novamente</p></a>
		 </div>


		</section>
		
		

		";

		echo" 		
		
		<script> 

		
		function troca() {

				document.getElementById('bloco1').style.display = 'none'; 
	
				document.getElementById('bloco2').style.display = 'block'; 
	
		}
		
		setTimeout(troca, 3000);


		</script>

		
		";
		}
	}
?>

</body>
</html>

