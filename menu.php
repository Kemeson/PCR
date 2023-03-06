<? include ('config.php'); ?>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="#" alt="">
    <span class="d-none d-lg-block">Femarh</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->
<a class="btn btn-outline-success" href="<?php echo $url ?>logout.php"><strong>Logout</strong></a>
<a class="btn btn-outline-success " href="https://wa.me/5595991460912">Entrar em contato com suporte</a>
<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">

  </form>
</div><!-- End Search Bar -->



  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar - menu ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="<?php echo $url ?>PainelFemarhExterno/">
      <i class="bi bi-grid"></i>
      <span>Minha Conta</span>
    </a>
  </li><!-- Final minha conta teste-->


  <li class="nav-item">
    <a class="nav-link " href="<?php echo $url ?>Mapa/">
      <i class="bi bi-grid"></i>
      <span>Mapa</span>
    </a>
  </li><!-- Final minha conta teste-->




  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Aquicultura e Gestão de Fauna</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">


          <!--  sub drop--->

          <li class="nav-item">
        <a class="nav-link" data-bs-target="#icons-nav1"  data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid"></i><span>Estoque de peixe</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav1" class="nav-content collapse " >
          


         <li class="nav-item">
            <a class="nav-link " href="<?php echo $url ?>EstoqueDePeixe/Painel/">
              <i class="bi bi-grid"></i>
              <span>Painel</span>
            </a>
          </li><!-- Final Estoque de Peixe  -->




          


        </ul>
      </li><!-- Final Aquicultura e Gestão de Fauna -->


<!-- fINAL SUBDROP-->


        </ul>
      </li><!-- Final Aquicultura e Gestão de Fauna -->







  
    

</ul>

</aside><!-- End Sidebar-->
