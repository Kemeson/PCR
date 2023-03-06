<!DOCTYPE html>
<html lang="pt-br">
<?php include "../../header.php"; ?>
</header>
<body>
<?php include "../../menu.php"; 

require_once('../db.php');

?>






<?php
/*
  if(isset($_GET['delete'])){
		$idDelete = $_GET['delete'];
		$sqlId = "select * from EstoqueDePeixe where id = ".$idDelete;
		$resultId = mysqli_query($conn, $sqlId);

		if(mysqli_num_rows($resultId) > 0){
      $sqlDelete = "delete EstoqueDepeixe where id=".$idDelete;
			if(mysqli_query($conn, $sqlDelete)){
				header('location:index.php');
			}
		}
	}
*/
?>




<?php
$usuario_id = $_SESSION['usuario'];

/*
  require_once('../db.php');
  $usuarioc = $_SESSION['usuario'];
    $sql5 = "SELECT * FROM usuario WHERE CpfCnpj LIKE '%$usuario%'";
  $result5 = mysqli_query($conn, $sql5);
  if(mysqli_num_rows($result5)){
    $row5 = mysqli_fetch_assoc($result5);

  
    
  }

*/




  
?>




<main id="main" class="main">


<div class="pagetitle">
      <h1>Painel de declarações</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Início</a></li>
                   <li class="breadcrumb-item active">Estoque de peixe</li>
                   <li class="breadcrumb-item active">Painel</li>
        </ol>
      </nav>
    <a href="<?php echo $url ?>EstoqueDePeixe/Painel/pdf.php" class="btn btn-success">Gerar Comprovante</a> 
    </div><!--  Final breadcumb-->


<!-- Início painel de declarações -->
<div class="col-12">
              <div class="card recent-sales overflow-auto">



                <div class="card-body">
                  <h5 class="card-title">Minhas declarações</h5>
               
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Opções</th>  
                        <th scope="col">#</th>
                        <th scope="col">Nome Vulgar</th>
                        <th scope="col">Espécie</th>
                        <th scope="col">Data</th>
                        <th scope="col">Status</th>
                    
                      </tr>
                    </thead>
                    <tbody>

                    <?php




                        
                   

                        $usuario_idSql = "SELECT * FROM usuario WHERE CpfCnpj LIKE '%$usuario_id%' ";
                        $usuario_idResult = mysqli_query($conn, $usuario_idSql);
                        mysqli_num_rows($usuario_idResult);
                        $usuario_idRow = mysqli_fetch_assoc($usuario_idResult);
                        $UsuarioMeuId =  $usuario_idRow['usuario_id'];
                   
                      

                      



                      
                        $sql = "SELECT * FROM EstoqueDePeixe where usuario_id=".$UsuarioMeuId;
                      
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result)){
                          while($row = mysqli_fetch_assoc($result)){


                                  
                                    if ($row['Status'] == "Aprovado") {
                                    $sigla = "badge bg-success";
                                    } elseif ($row['Status'] == "Pendente") {
                                    $sigla = "badge bg-warning";
                                    }elseif ($row['Status'] == "Rejeitado") {
                                    $sigla = "badge bg-danger";
                                    }



                      ?>


                      <tr>
                   
                   <?php $DataAi =  date('d/m/Y',strtotime($row["DataSaida"]));?>

                      
                                       <td>
                                            <form action="../editar.php" method="GET" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="IdEstoque"  value="<?php echo base64_encode($row['id']); ?>" >
                      <button type="submit" name="Ret"  class="btn btn-info">Retificar</button>
                      <!--- <a href="index.php?delete=<?php echo$row['id']; ?>" class="btn btn-danger" onclick="return confirm('Você quer deletetar essa declaração?')">Deletar</a> --->                      </form>      
                      
                      
                      
                      
                      </td>
                      
                      
                      
                      <td>

       
                       
                      <?php echo $row['id'] ?>
                      </td>
     
                      <td><?php echo $row['Especie'] ?></td>
                      <td><?php echo $row['TipoDeEmbalagem'] ?></td>
                      <td><?php  echo $DataAi?></td>
                      <td><span class="<?php echo $sigla ?>"><?php echo $row['Status'] ?></td>
                      
                                                           
           
                           
     
              </tr>



                      <?php
                              }
                            }
                          
                          ?>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!--Final painel de declarações -->






           







</main>


</body>
<?php include "../../footer.php"; ?>
</html>