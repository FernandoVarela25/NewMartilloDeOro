<nav class="navbar bg-dark-subtle navbar-expand-md sticky-top" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand">Bienvenido, <?php echo $_SESSION['name'] ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-sm-0">
                <li class="nav-item px-1">
                    <a class="btn btn-outline-light" href="Index_employed.php?ruta=start">Inicio</a>
                </li>
                <li class="nav-item px-1">
                    <a class="btn btn-outline-light" href="Index_employed.php?ruta=homework">Tareas</a>
                </li>
                <li>
                    <a class="btn btn-outline-light" href="../db_MartillodeOro/end_login.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>