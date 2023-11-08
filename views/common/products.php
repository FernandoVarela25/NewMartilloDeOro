<div class="container-fluid">
    <hr class="my-2">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="Index_common.php?ruta=start"><i class="bi bi-house"></i></a></li>
                    <li class="breadcrumb-item"aria-current="page">Productos</li>
                </ol>
            </nav>
        </div>
    </div>
    <hr class="my-2">
    <div class="row h3 justify-content-center">Categorias</div>
        <hr class="my-2">
        <div class="row pt-3 pb-3">
            <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                <div class="card text-white bg-dark" style="width: 18rem;">
                    <img id="imagenp"  src="assets/img/pinturasycomplementos.jpg" class="hower-effect"  height="150px" alt="..." >
                    <div class="card-body">
                        <h5 class="card-title">Pinturas y complementos</h5>
                        <a href="Index_common.php?ruta=PinturasYComplementos">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                <div class="card text-white bg-dark" style="width: 18rem;">
                    <img id="imagena" src="assets/img/materialelectrico.jpg" class="card-img-top" height="150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Material Electrico</h5>
                        <a href="Index_common.php?ruta=MaterialElectrico">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                <div class="card text-white bg-dark" style="width: 18rem;">
                    <img id="imagenb" src="assets/img/plomeria.jpg" class="card-img-top" height="150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Plomeria</h5>
                        <a href="Index_common.php?ruta=Plomeria">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                <div class="card text-white bg-dark" style="width: 18rem;">
                    <img id="imagenc" src="assets/img/carpinteria.jpg" class="card-img-top" height="150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Carpinteria</h5>
                        <a href="Index_common.php?ruta=Carpinteria">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-3 pb-3">
            <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                <div class="card text-white bg-dark" style="width: 18rem;">
                    <img id="imagend" src="assets/img/bañoyfontaneria.jpg" class="card-img-top" height="150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Baño y fontaneria</h5>
                        <a href="Index_common.php?ruta=BañoYFontaneria">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                <div class="card text-white bg-dark" style="width: 18rem;">
                    <img id="imagene" src="assets/img/cerrajeria.jpg" class="card-img-top" height="150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cerrajeria</h5>
                        <a href="Index_common.php?ruta=Cerrajeria">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                <div class="card text-white bg-dark" style="width: 18rem;">
                    <img id="imagenf" src="assets/img/industria.jpg" class="card-img-top" height="150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Industria</h5>
                        <a href="Index_common.php?ruta=Industria">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-3 col-lg-4 col-md-6">
                <div class="card text-white bg-dark" style="width: 18rem;">
                    <img id="imageng" src="assets/img/electroportatiles.jpg" class="card-img-top" height="150px" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Electroportátiles</h5>
                        <a href="Index_common.php?ruta=Electroportatiles">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-2">
</div>
<script>
var imagen1 = document.getElementById('imagenp');
imagen1.addEventListener('mouseover', function() {
    this.src = 'assets/img/info.png';
});
imagen1.addEventListener('mouseout', function() {
this.src = 'assets/img/pinturasycomplementos.jpg';
});

var imagen2 = document.getElementById('imagena');
imagen2.addEventListener('mouseover', function() {
    this.src = 'assets/img/info.png';
});
imagen2.addEventListener('mouseout', function() {
this.src = 'assets/img/materialelectrico.jpg';
});

var imagen3 = document.getElementById('imagenb');
imagen3.addEventListener('mouseover', function() {
    this.src = 'assets/img/info.png';
});
imagen3.addEventListener('mouseout', function() {
this.src = 'assets/img/plomeria.jpg';
});

var imagen4 = document.getElementById('imagenc');
imagen4.addEventListener('mouseover', function() {
    this.src = 'assets/img/info.png';
});
imagen4.addEventListener('mouseout', function() {
this.src = 'assets/img/carpinteria.jpg';
});

var imagen5 = document.getElementById('imagend');
imagen5.addEventListener('mouseover', function() {
    this.src = 'assets/img/info.png';
});
imagen5.addEventListener('mouseout', function() {
this.src = 'assets/img/bañoyfontaneria.jpg';
});

var imagen6 = document.getElementById('imagene');
imagen6.addEventListener('mouseover', function() {
    this.src = 'assets/img/info.png';
});
imagen6.addEventListener('mouseout', function() {
this.src = 'assets/img/cerrajeria.jpg';
});

var imagen7 = document.getElementById('imagenf');
imagen7.addEventListener('mouseover', function() {
    this.src = 'assets/img/info.png';
});
imagen7.addEventListener('mouseout', function() {
this.src = 'assets/img/industria.jpg';
});

var imagen8 = document.getElementById('imageng');
imagen8.addEventListener('mouseover', function() {
    this.src = 'assets/img/info.png';
});
imagen8.addEventListener('mouseout', function() {
this.src = 'assets/img/electroportatiles.jpg';
});

</script>