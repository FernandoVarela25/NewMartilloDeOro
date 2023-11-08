<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5  justify-content-center align-items-center mb-5">
            <div class="col-8 mb-5 mb-lg-0 position-relative text-center">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                <div class="card bg-glass shadow-5-strong">
                    <div class="card-body px-4 py-5 px-md-5">
                        <h2 class="fw-bold mb-3">Restablece tu contraseña</h2>
                        <hr class="my-2">
                        <form action="views/db_MartillodeOro/recovery.php" method="post">
                            <div class="mb-4">
                                <label class="form-label" for="email">Confirma tu correo electronico</label>
                                <input class="form-control" type="email" id="email" name="email" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="new_password">Contraseña nueva</label>
                                <input class="form-control" type="password" id="new_password" name="new_password" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="confirm_password"> Confirma tu contraseña</label>
                                <input class="form-control" type="password" id="confirm_password" name="confirm_password" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="token">Token</label>
                                <input class="form-control" type="text" id="token" name="token" required>
                            </div>
                            <?php
                                if(isset($_GET['error']) && $_GET['error'] == 'success_recovery_password'){
                                    echo '
                                        <div class="alert alert-success" id="alert_SuccessRecoveryPassword">
                                            Tu contraseña se cambio correctamente
                                        </div>
                                    ';
                                } else if(isset($_GET['error']) && $_GET['error'] == 'failure_recovery_password'){
                                    echo '
                                        <div class="alert alert-danger" id="alert_FailureRecoveryPassword">
                                            Tu contraseña no se cambio
                                        </div>
                                    ';
                                } else if(isset($_GET['error']) && $_GET['error'] == 'failure_data'){
                                    echo '
                                        <div class="alert alert-danger" id="alert_FailureData">
                                            Verifica que las contraseñas que proporcionaste son iguales
                                        </div>
                                    ';
                                }
                            ?>
                            <button type="submit" class="btn btn-outline-primary btn-block mb-4">Cambiar contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>