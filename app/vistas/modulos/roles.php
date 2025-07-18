<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Agregar Rol</h5>

            <form method="POST" action="index.php?route=role&action=save" >
                <div class="row mb-3">
                <label for="inputRole" class="col-sm-2 col-form-label">Nombre Rol</label>
                <div class="col-sm-10">
                    <input type="text" name="roleName" class="form-control" id="inputRole">
                </div>
                </div>
                <div class="row mb-3">
                <label for="inputDescription" class="col-sm-2 col-form-label">Descripción</label>
                <div class="col-sm-10">
                    <input type="text" name="roleDescription" class="form-control" id="inputDescription">
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