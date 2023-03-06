<?php
require_once('../../../DbPcr.php');
$upload_dir = '../ArquivosEnviados/';


if (isset($_POST['Enviar'])) {
   


	
    $Nome = $_POST['Nome'];
    $usuario = $_POST['usuario'];
    $CpfCnpj = $_POST['CpfCnpj'];
	$senha = $_POST['senha'];
	$NomeDaMae = $_POST['NomeDaMae'];
	$DataDeNascimento = $_POST['DataDeNascimento'];
	$Email = $_POST['Email'];
	$Telefone = $_POST['Telefone'];
	$Endereco = $_POST['Endereco'];




if (!empty($CpfCnpj)){

	
	$sql9 = "SELECT * FROM usuario WHERE CpfCnpj LIKE '%$CpfCnpj%'";
	$result9 = mysqli_query($conn, $sql9);
	if(mysqli_num_rows($result9)){
	  $row9 = mysqli_fetch_assoc($result9);
  
	  $Confere = $row9['CpfCnpj'];
	 
	}
  
	if(isset($Confere) ){
		echo "CPF/CNPJ já  foi castrado, entre em contato com o suporte!
		<a class='nav-link ' href='https://wa.me/5595991460912'>Entrar em contato com suporte</a>
		
		
		
		";
      
	} else {
		echo "Cadstro realizado com sucesso!";




			//Documento com foto




					$NomeDoArquivoEnviado1 = $_FILES['ArquivoEnviado1']['name'];
					$NomeTemporarioArquivoEnviado1 = $_FILES['ArquivoEnviado1']['tmp_name'];
					$TamanhoDoArquivoEnviado1 = $_FILES['ArquivoEnviado1']['size'];



					if($NomeDoArquivoEnviado1){

						$ExtensaoArquivoEnviado1 = strtolower(pathinfo($NomeDoArquivoEnviado1, PATHINFO_EXTENSION));
						$PermitirExtensaoArquivoEnviado1  = array('pdf','jpeg', 'jpg', 'png');
						$NovoNomeArquivoEnviado1 = time().'_'.rand(1000,9999).'.'.$ExtensaoArquivoEnviado1;

						if(in_array($ExtensaoArquivoEnviado1, $PermitirExtensaoArquivoEnviado1)){
							if($TamanhoDoArquivoEnviado1 < 5000000){
					
									move_uploaded_file($NomeTemporarioArquivoEnviado1 ,$upload_dir.$NovoNomeArquivoEnviado1); 
							}else{
								$errorMsg = 'Arquivo muito grande';
								echo $errorMsg;
							}
						}else{
							$errorMsg = 'Selecione um arquivo válido';
							echo $errorMsg;
						}
					}else{

						$NovoNomeArquivoEnviado1 = null; //nome coluna
					}


					//Comprovante de residência




						$NomeDoComprovanteDeResidencia = $_FILES['ComprovanteDeResidencia']['name'];
						$NomeTemporarioComprovanteDeResidencia = $_FILES['ComprovanteDeResidencia']['tmp_name'];
						$TamanhoDoComprovanteDeResidencia = $_FILES['ComprovanteDeResidencia']['size'];



					if($NomeDoComprovanteDeResidencia){

						$ExtensaoComprovanteDeResidencia = strtolower(pathinfo($NomeDoComprovanteDeResidencia, PATHINFO_EXTENSION));
						$PermitirExtensaoComprovanteDeResidencia  = array('pdf','jpeg', 'jpg','png');
						$NovoNomeComprovanteDeResidencia = time().'_'.rand(1000,9999).'.'.$ExtensaoComprovanteDeResidencia;

						if(in_array($ExtensaoComprovanteDeResidencia, $PermitirExtensaoComprovanteDeResidencia)){
							if($TamanhoDoComprovanteDeResidencia < 5000000){
									
									move_uploaded_file($NomeTemporarioComprovanteDeResidencia ,$upload_dir.$NovoNomeComprovanteDeResidencia); 
							}else{
								$errorMsg = 'Arquivo muito grande';
								echo $errorMsg;
							}
						}else{
							$errorMsg = 'Selecione um arquivo válido';
							echo $errorMsg;
						}
					}else{

						$NovoNomeComprovanteDeResidencia = null; //nome coluna
					}



					//Comprovante de residência




					$NomeDoComprovanteDeResidencia = $_FILES['ComprovanteDeResidencia']['name'];
					$NomeTemporarioComprovanteDeResidencia = $_FILES['ComprovanteDeResidencia']['tmp_name'];
					$TamanhoDoComprovanteDeResidencia = $_FILES['ComprovanteDeResidencia']['size'];



				if($NomeDoComprovanteDeResidencia){

					$ExtensaoComprovanteDeResidencia = strtolower(pathinfo($NomeDoComprovanteDeResidencia, PATHINFO_EXTENSION));
					$PermitirExtensaoComprovanteDeResidencia  = array('pdf','jpeg', 'jpg','png');
					$NovoNomeComprovanteDeResidencia = time().'_'.rand(1000,9999).'.'.$ExtensaoComprovanteDeResidencia;

					if(in_array($ExtensaoComprovanteDeResidencia, $PermitirExtensaoComprovanteDeResidencia)){
						if($TamanhoDoComprovanteDeResidencia < 5000000){
								
								move_uploaded_file($NomeTemporarioComprovanteDeResidencia ,$upload_dir.$NovoNomeComprovanteDeResidencia); 
						}else{
							$errorMsg = 'Arquivo muito grande';
							echo $errorMsg;
						}
					}else{
						$errorMsg = 'Selecione um arquivo válido';
						echo $errorMsg;
					}
				}else{

					$NovoNomeComprovanteDeResidencia = null; //nome coluna
				}


		//Foto3x4




		$NomeDoFoto3x4 = $_FILES['Foto3x4']['name'];
		$NomeTemporarioFoto3x4 = $_FILES['Foto3x4']['tmp_name'];
		$TamanhoDoFoto3x4 = $_FILES['Foto3x4']['size'];



		if($NomeDoFoto3x4){

		$ExtensaoFoto3x4 = strtolower(pathinfo($NomeDoFoto3x4, PATHINFO_EXTENSION));
		$PermitirExtensaoFoto3x4  = array('jpeg', 'jpg', 'png');
		$NovoNomeFoto3x4 = time().'_'.rand(1000,9999).'.'.$ExtensaoFoto3x4;

		if(in_array($ExtensaoFoto3x4, $PermitirExtensaoFoto3x4)){
			if($TamanhoDoFoto3x4 < 5000000){
					
					move_uploaded_file($NomeTemporarioFoto3x4 ,$upload_dir.$NovoNomeFoto3x4); 
			}else{
				$errorMsg = 'Arquivo muito grande';
				echo $errorMsg;
			}
		}else{
			$errorMsg = 'Selecione um arquivo válido';
			echo $errorMsg;
		}
		}else{

		$NovoNomeFoto3x4 = null; //nome coluna
		}



			

		if(!isset($errorMsg)){
			$sql = "insert into usuario (Nome, usuario, CpfCnpj, senha, Telefone, Email, DataDeNascimento, NomeDaMae, arquivo, ComprovanteDeResidencia, Foto3x4, Endereco)
					values('".$Nome."', '".$usuario."', '".$CpfCnpj."', '".$senha."','".$Telefone."','".$Email."', '".$DataDeNascimento."', '".$NomeDaMae."', '".$NovoNomeArquivoEnviado1."', '".$NovoNomeComprovanteDeResidencia."', '".$NovoNomeFoto3x4."', '".$Endereco."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'Cadastro concluído';
				header('Location: ../index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
				echo $errorMsg;
			}
		}


	}//else entra cadastro


	
}//Fim verififca cpf cnpj



	}//Verifica formulário
?>
