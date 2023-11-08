<div class="container-fluid text-center text-white">
    <p class="h3 pt-3">Añadir un nuevo producto</p>
    <hr class="my-4">
    <div id="resp"></div>
    <hr class="my-3">
    <form id="formCan" class="row g-3">
        <div class="col-12 col-md-4">
            <label class="form-label h5">Nombre del producto</label>
            <input type="text" name="nombre" class="form-control">
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label h5">Codigo de barras</label>
            <input type="text" name="cod_barras" class="form-control">
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label h5">Precio</label>
            <input type="text" name="precio" class="form-control">
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label h5">Existencias</label>
            <input type="text" name="existencias" class="form-control" placeholder="Existencias">
        </div>
        <div class="col-12">
            <label class="form-label h5">Imagen</label>
            <input type="file" name="archivoImagen" id="miArchivo" class="form-control">
        </div>
        <div id="divFoto" class="text-white"></div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Añadir</button>
        </div>
    </form>
</div>
<script src="Vistas/js/nuevaCancion.js" type="module"></script> 