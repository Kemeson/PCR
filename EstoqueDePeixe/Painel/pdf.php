<?php
session_start();
//include "../../header.php"; 
require_once '../../vendor/autoload.php';
require_once('../../../../db.php');


$usuario = $_SESSION['usuario'];
$sql2 = "SELECT * FROM usuario WHERE CpfCnpj LIKE '%$usuario%'";
$result2 = $conn->query($sql2);


if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $usuario_id = $row2['usuario_id'];
    
}










use \Mpdf\Mpdf;

// Crie uma instância do mPDF
$mpdf = new Mpdf();

// Adicione o conteúdo ao PDF






    
    
    





$html = '<!DOCTYPE html>';
$html .= '<html lang="pt-br">';
$html .= '<head>';
$html .= '<meta charset="UTF-8">';
$html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
$html .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">

<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">


<link href="assets/css/style.css" rel="stylesheet">


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>


';
$html .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
$html .= '<title>Declaração</title>';
$html .= '<link href="pdf.css" rel="stylesheet">';
$html .= '</head>';
$html .= '<body>';

$html .= '<img id="logo" src="assets/img/logo-femarh-governo.png">';
$html .= '<h1 id = "tit" >Fundação Estadual do Meio Ambiente e Recursos Hídricos - FEMARH 
</h1>';
$html .= '<h2 id = "tit" >Declaração de estoque de peixe</h2>';


$html .= '<h2 >Dados do declarante</h2>';




$sql7 = "SELECT usuario.*, EstoqueDePeixe.* FROM usuario LEFT JOIN EstoqueDePeixe ON usuario.usuario_id = EstoqueDePeixe.usuario_id  WHERE usuario.usuario_id=".$usuario_id;






$result7 = mysqli_query($conn, $sql7);
if(mysqli_num_rows($result7)){
    $row7 = mysqli_fetch_assoc($result7);
   
   $DataAi =  date('d/m/Y',strtotime($row7["DataDeNascimento"]));
    $html .= ' <h4>Nome: '.$row7['Nome'].'</h4>';
    $html .= ' <h4>CPF/CNPJ: '.$row7['CpfCnpj'].'</h4>'; 
    $html .= ' <h4>Data de Nascimento: '.$DataAi.'</h4>';
    $html .= ' <h4>Endereço: '.$row7['Endereco'].'</h4>';
   
}

 



$sql = "SELECT usuario.*, EstoqueDePeixe.* FROM usuario LEFT JOIN EstoqueDePeixe ON usuario.usuario_id = EstoqueDePeixe.usuario_id  WHERE usuario.usuario_id=".$usuario_id;
$result = $conn->query($sql);




$html .= '<h2 >Dados declarados:</h2>';

// Cria uma tabela com os dados recuperados
$html .= '<table id= "tabela" class="table table-borderless datatable">';
$html .= '

<tr style="border: 1px solid; border-color: black;">

            <th style="border: 1px solid; border-color: black;" scope="col">Especie </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Nome Popular </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Grau De Industrializacao </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Quantidade </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Peso </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Tipo De Embalagem </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Categoria </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Registro Mapa Aderr </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Data Saida </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Município </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Data De Chegada </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Municipio De Destino </th>
            <th style="border: 1px solid; border-color: black;" scope="col" >Status </th>


            </tr>';



if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        
        
        $DataAi1 =  date('d/m/Y',strtotime($row["DataSaida"]));
        $DataAi2 =  date('d/m/Y',strtotime($row["DataDeChegada"]));
        $html .= '<tr style="border: 1px solid; border-color: black;">';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['Especie'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['NomeVulgar'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['GrauDeIndustrializacao'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['Quantidade'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['Peso'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['TipoDeEmbalagem'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['Categoria'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['RegistroMapaAderr'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $DataAi1 . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['Municipio'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $DataAi2 . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['MunicipioDeDestino'] . '</td>';
        $html .= '<td style="border: 1px solid; border-color: black;" >' . $row['Status'] . '</td>';
       
        
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="13">Nenhum dado encontrado</td></tr>';
}
$html .= '</table>';

// Adiciona a tabela ao arquivo PDF
//$mpdf->WriteHTML($html);

// Gera o arquivo PDF e o envia para o navegador
//$mpdf->Output('tabela.pdf', 'D');






$html .= '</body>';
$html .= '</html>';

//echo $html;







     
$mpdf->WriteHTML ("$html"); 

 

// Gere o PDF
$mpdf->Output('tabela.pdf', 'D');

?>


