<?php

  require_once('db.php');
 

    $Especie = $_POST['Especie'];
    $NomeVulgar = $_POST['NomeVulgar'];
    $GrauDeIndustrializacao = $_POST['GrauDeIndustrializacao'];
	$Quantidade = $_POST['Quantidade'];
	$Peso = $_POST['Peso'];
	$TipoDeEmbalagem = $_POST['TipoDeEmbalagem'];
	$Categoria = $_POST['Categoria'];
	$RegistroMapaAderr = $_POST['RegistroMapaAderr'];
	$DataSaida = $_POST['DataSaida'];
	$Municipio = $_POST['Municipio'];
    $usuario_id = $_POST['usuario_id'];
	$MunicipioDeDestino = $_POST['MunicipioDeDestino'];
	$DataDeChegada = $_POST['DataDeChegada'];
	$Status = "Pendente";

 


	
			$sql = "insert into EstoqueDePeixe (Especie, NomeVulgar, GrauDeIndustrializacao, Quantidade, Peso, TipoDeEmbalagem, Categoria, RegistroMapaAderr, DataSaida, Municipio, usuario_id, Status, MunicipioDeDestino, DataDeChegada )
					values('".$Especie."', '".$NomeVulgar."', '".$GrauDeIndustrializacao."', '".$Quantidade."','".$Peso."','".$TipoDeEmbalagem."', '".$Categoria."','".$RegistroMapaAderr."', '".$DataSaida."','".$Municipio."', '".$usuario_id."', '".$Status."', '".$MunicipioDeDestino."', '".$DataDeChegada."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'Estoque adicionado';
				header('Location: ./Painel/');
			}
		

?>
