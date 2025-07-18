<?php
    $roles = RoleController::ctrGetAllRoles();
    $users = UserController::ctrGetAllUsers();
?>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Asignar Rol a un Usuario</h5>

          <form method="POST" action="index.php?route=roleUser&action=assign">
            <div class="row mb-3">
              <label for="inputRole" class="col-sm-2 col-form-label">Rol</label>
              <div class="col-sm-10">
                <select name="role" class="form-control" id="inputRole" required>
                  <option value="">Seleccione un rol</option>
                  <?php foreach($roles as $role): ?>
                    <option value="<?= $role["pk_id_role"] ?>"><?= $role["role_name"] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row mb-3">
              <label for="inputUser" class="col-sm-2 col-form-label">Usuario</label>
              <div class="col-sm-10">
                <select name="user" class="form-control" id="inputUser" required>
                  <option value="">Seleccione un usuario</option>
                   <?php foreach($users as $user): ?>
                    <option value="<?= $user["pk_id_user"] ?>"><?= $user["user_name"] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
              <button type="reset" class="btn btn-secondary">Limpiar</button>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</section>
