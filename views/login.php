<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                <h1 class="my-3 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                    Bienvenidos a la ferreteria <br />
                    <span style="color: hsl(218, 81%, 75%)">El Martillo de Oro</span>
                </h1>
                <p class="mb-2 opacity-70" style="color: hsl(218, 81%, 85%)">
                    La ferreteria "El Martillo de Oro" ofrece un amplia variedad de herramientas, 
                    accesorios, maquinaria y equipo necesario para cualquier tipo de trabajo como 
                    plomeria, carpinteria, herreria.
                </p>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0 position-relative text-center">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                <div class="card bg-glass shadow-5-strong">
                    <div class="card-body px-4 py-5 px-md-5">
                        <h2 class="fw-bold mb-5">Iniciar Sesion</h2>
                        <form id="login_form" action="views/db_MartillodeOro/start_login.php" method="POST">
                            <div class="form-outline mb-4">
                                <label class="form-label" for="login_username">Nombre de usuario </label>
                                <input class="form-control" type="text" id="login_email" name="login_username" required>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="login_password">Contraseña</label>
                                <input class="form-control" type="password" id="login_password" name="login_password" required>
                            </div>
                            <?php
                                if(isset($_GET['error']) && $_GET['error'] == 'failure_login'){
                                    echo '
                                        <div class="alert alert-danger" id="alert_FailureLogin">
                                            Nombre de usuario o contraseña invalidos
                                        </div>
                                    ';
                                }
                            ?>
                            <div class="mb-4">
                                <a href="?ruta=forgot_password">¿Olvidaste tu contraseña?</a>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block mb-4">Entrar</button>
                            <div class="text-center">
                                <p>¿No tienes cuenta? <a class="" href="?ruta=register">Registrate</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>