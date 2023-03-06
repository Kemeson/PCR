<?php 
session_start();
include ('config.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Femarh</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="./bulma/css/bulma.min.css" />
<link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>


    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
</head>
<body>


<section class="hero is-fullheight">
<div class="hero-body">
<div class="container has-text-centered">
<div class="column is-4 is-offset-4">
<h3 class="title has-text-black">Sistema Único - Femarh</h3>
<?php
if(isset($_SESSION['nao_autenticado'])):
?>

<div class="notification is-danger">       <p>ERRO: Usuário ou senha inválidos.</p>          </div>
<?php 
endif;
unset($_SESSION['nao_autenticado']); 
?>
<div class="box">
<form action="login.php" method="POST">
<div class="field">
<div class="control">
<input name="usuario" type="text"  class="input is-large CpfCnpj" autocomplete="off" maxlength="14"  placeholder="Seu CPF ou CNPJ" autofocus="" required>
</div>
</div> 

<div class="field">
<div class="control">
<input name="senha" class="input is-large" type="password" placeholder="Sua senha" required>
</div>
</div>
<button type="submit" class="button is-block is-link is-large is-fullwidth">Entrar</button>
</form>
<a class="nav-link " href="<?php echo $url ?>CadastroUsuarioExterno/">Não poussuo cadastro</a>
<a class="nav-link " href="Recuperar_Senha1/recuperar_senha.php">Recuperar Senha</a>
<a class="nav-link " href="https://wa.me/5595991460912">Entrar em contato com suporte</a>
</div>
</div>
</div>
</div>
</section>

<?php
include ('footer.php');  ?>