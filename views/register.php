<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5  justify-content-center align-items-center mb-5">
            <div class="col-10 mb-5 mb-lg-0 position-relative text-center">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                <div class="card bg-glass shadow-5-strong">
                    <div class="card-body px-4 py-5 px-md-5">
                        <h2 class="fw-bold mb-3">Crea una cuenta nueva</h2>
                        <hr class="my-2">
                        <form id="form_register" action="views/db_MartillodeOro/guardar_datos.php" method="post" class="row g-3 was-validated" novalidate>
                            <div class="col-12 col-md-4">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="usuario" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="usuario" name="usuario" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="correo" class="form-label">Correo electronico</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                            </div>
                            <?php
                                if(isset($_GET['error']) && $_GET['error'] == 'success_register'){
                                    echo '
                                        <div class="alert alert-success" id="alert_SuccessRegister">
                                            Usuario creado correctamente
                                        </div>
                                    ';
                                }
                            ?>
                            <div class="col-12 text-center">
                                <button class="btn btn-outline-primary" type="submit">Registrarte</button>
                            </div>
                            <div class="text-center">
                            <div class="text-center">
                                <p>¿Ya tienes cuenta? <a href="Index.php">Inicia Sesion</a></p>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>