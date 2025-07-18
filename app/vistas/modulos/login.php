<?php
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"] === "ok") return;

require_once "app/controladores/login.controller.php";

// Mostrar toast si hubo error de login
if (!empty($_SESSION["login_error"])) {
    echo '
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      Swal.fire({
        toast: true,
        position: "top-end",
        icon: "error",
        title: "' . $_SESSION["login_error"] . '",
        showConfirmButton: false,
        timer: 3000
      });
    </script>';
    unset($_SESSION["login_error"]);
}
?>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="#" class="logo d-flex align-items-center w-auto">
                <img src="app/vistas/assets/img/logo.png" alt="">
                <span class="d-none d-lg-block">cabscode</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Inicia con tu cuenta</h5>
                </div>

                <form class="row g-3 needs-validation" action="index.php?route=login&action=verify" method="post" novalidate>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Correo</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="email" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Ingresa tu correo</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Ingresa tu contraseña</div>
                  </div>

                  <div class="col-12">                    
                    <button class="btn btn-primary w-100" type="submit">Entrar</button>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>
    </section>

  </div>
</main><!-- End #main -->
