<!DOCTYPE html>
<html lang="pt-br">
<?php include "../header.php"; ?>

<?php
  require_once('../../../db.php');
  $usuario = $_SESSION['usuario'];
  
  $sql = "SELECT * FROM usuario WHERE CpfCnpj LIKE '%$usuario%'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)){
  $row = mysqli_fetch_assoc($result);

  
    
  }
  ?>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="mapa.css"/>

    <script src="areaImovel1.geojson"></script>
    <script src="limitesMunicipais.geojson"></script>


    <link rel="stylesheet" href="leaflet/leaflet.css" />  
    <script src="leaflet/leaflet.js"></script>
    <script src="https://unpkg.com/@ngageoint/leaflet-geopackage@2.0.5/dist/leaflet-geopackage.min.js"></script>
     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="stylesheet" href="leaflet/Leaflet.GraphicScale.min.css" />
    <script src="leaflet/Leaflet.GraphicScale.min.js"></script>

    <link rel="stylesheet" type="text/css" href="leaflet/L.Control.ZoomBar.css"/>
    <script type="text/javascript" src="leaflet/L.Control.ZoomBar.js"></script>

    <link rel="stylesheet" href="leaflet/MarkerCluster.css" />
    <link rel="stylesheet" href="leaflet/MarkerCluster.Default.css" />
    <script src="leaflet/leaflet.markercluster.js"></script>
</header>
<body>
<?php include "../menu.php"; ?>

<main id="main" class="main">
<div>
<div id="map" ></div>
<script>

    var limitesMunic = L.geoJSON(limitesMunic, {
        color: "black",
        opacity: "1.0",
        fillOpacity: "0",
        weight: "1",
        onEachFeature: function (geom, layer) {
          layer.bindPopup('<h6><b>Limites Municipais</b></h6><p><b>Geocódigo:</b> '+geom.properties.geocodigo+'<br><b>Nome:</b> '+geom.properties.nome+'<br><b>Área:</b> '+geom.properties.area_ha.toLocaleString('pt-BR', {minimumFractionDigits: 4,maximumFractionDigits: 4})+' ha.</p>');
        }
    });

    var cpf = '<?php echo $row['CpfCnpj']; ?>';
    console.log(cpf);

    var areaImo = L.geoJSON(areaImovel1, {
    style: function(features) {
        switch (features.properties.cpf_cnpj) {
            case cpf: return {color: "red", weight: "2"};
            default: return {fillOpacity: 0,  weight: "0"};
        }
    },
    onEachFeature: function (features, layer) {
        layer.bindPopup('<h6><b>Área do Imóvel</b></h6><p><b>GID:</b> '+features.properties.gid+'<br><b>Imóvel:</b> '+features.properties.nome_imov+'<br><b>Município:</b> '+features.properties.municip+'<br><b>Gleba:</b> '+features.properties.gleba+'<br><b>CAR:</b> '+features.properties.car+'<br><b>SIGEF:</b> '+features.properties.sigef+'<br><b>Área:</b> '+features.properties.area+' ha.<br><b>Nome do Empreendedor:</b> '+features.properties.nome_emp+'<br><b>CPF/CNPJ:</b> '+features.properties.cpf_cnpj+'<br><b>Usuário:</b> '+features.properties.usuario+'</p>');
    }
    });
</script>
<script src="mapa.js"></script>
</div>
</main>



<script src="bootstrap/js/bootstrap.bundle.js"></script>

</body>
<?php include "../footer.php"; ?>
</html>