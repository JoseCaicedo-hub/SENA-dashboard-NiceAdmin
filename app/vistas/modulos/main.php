  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

      <?php       
          if (session_status() !== PHP_SESSION_ACTIVE) {
              session_start();
          }         
           if (isset($_GET["route"])){

            $allowedRoutes = ["home","users","exit", "login", "roles", "asignarRol"];

            if(in_array($_GET["route"],$allowedRoutes)){ 

              include "app/vistas/modulos/".$_GET["route"].".php";

            }else{
              include "app/vistas/modulos/404.php";
            }

          }else{

            include "app/vistas/modulos/home.php";

          }
        

      ?>

      </div>
    </section>

  </main>