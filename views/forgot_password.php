<section class="background-radial-gradient overflow-hidden">
    <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5  justify-content-center align-items-center mb-5">
            <div class="col-8 mb-5 mb-lg-0 position-relative text-center">
                <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                <div class="card bg-glass shadow-5-strong">
                    <div class="card-header">
                        <h2 class="fw-bold mb-3">Recupera tu cuenta</h2>
                    </div>
                    <div class="card-body px-4 py-5 px-md-5">
                        <form action="views/db_MartillodeOro/recovery.php" method="post">
                            <div class="col-12 mb-4">
                                <label class="form-label" for="recovery_email">Ingresa tu correo electrónico para buscar tu cuenta</label>
                                <input class="form-control" type="email" id="recovery_email" name="recovery_email" placeholder="Correo Electronico" required>
                            </div>
                            <?php
                                if(isset($_GET['error']) && $_GET['error'] == 'user_not_found'){
                                    echo '
                                        <div class="alert alert-danger" id="alert_UserNotFound">
                                            El correo que proporcionaste no esta asociado a ninguna cuenta
                                        </div>
                                    ';
                                } else if(isset($_GET['error']) && $_GET['error'] == 'success_email'){
                                    echo '
                                        <div class="alert alert-success" id="alert_SuccessEmail">
                                            El correo se ha enviado correctamente
                                        </div>
                                    ';
                                }
                            ?>
                            <button class="btn btn-outline-primary" type="submit">Siguiente</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>