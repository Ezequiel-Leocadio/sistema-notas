<?php @$info =$_REQUEST['info']; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width">
	<link rel="icon" type="image/png" href="public/assets/img/icone.png" />
	<link rel="stylesheet" type="text/css" href="public/assets/css/login.css">	
	<link rel="stylesheet" type="text/css" href="public/assets/lib/font-awesome/css/font-awesome.css">
	<link href="public/assets/lib/bootstrap_e_data-table/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/assets/lib/bootstrap_e_data-table/css/dataTables.bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container2">

<?php  if($info=="erro"){?>

		<div  class="alert alert-danger alert-dismissible" role="alert">
		  <button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Usuario ou Senha Incorretos !!!!</strong>
		</div>

<?php }elseif ($info=="negado") {?>
		
		<div  class="alert alert-danger alert-dismissible" role="alert">
		  <button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Acesso Somento a Pessoas Autorisadas !!!!</strong>
		</div>


<?php } ?>
		<h1>Login</h1>

		<form action="includes/login.php" method="post">
			<div class="form-input">
				<input type="text" name="txtLogin" placeholder="Coloque seu Login" required="" autofocus="" tabindex="1">
			</div>
			<div class="form-input">
				<input type="password" name="txtSenha" placeholder="Coloque sua Senha" required="" tabindex="2">
			</div>
			<button  type="submit" class="btn-login">Entrar</button>
		</form>
	</div>

	<script src="public/assets/lib/bootstrap_e_data-table/js/jquery.js"></script>
	<script src="public/assets/lib/bootstrap_e_data-table/js/bootstrap.min.js"></script>



</body>
</html>