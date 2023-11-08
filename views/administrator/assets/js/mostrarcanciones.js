document.addEventListener('DOMContentLoaded', mostrarCanciones);
document.getElementById('canciones').addEventListener('click', obtenerBotonClicked)

function mostrarCanciones(){
    var arrayCan=[]
    const endPoint="http://localhost/musica/driverCancion.php/";
    fetch(endPoint,{ method: "GET", headers: { 'Content-Type': 'application/x-www-form-urlencoded'}})
    .then(function(res){ return res.json()})
    .then(function(res){ arrayCan = convertirJSONarray(res); console.log("arry Js", arrayCan); mostrarArrayCan(arrayCan);})
    .catch(console.error);
}

function convertirJSONarray(datos){
    var arrayC = []
    datos.forEach(function(item) { arrayC.push(item)})
    return arrayC;
}

function mostrarArrayCan(arrayCancion){
    let x = 0
    arrayCancion.forEach(function(Cancion){
        let Renglon = document.createElement('tr'); Renglon.id = "ren" + x;
        let Tabla = document.getElementById("canciones");
        Tabla.appendChild(Renglon);

        let Celda = document.createElement('td'); Celda.id = "celda" + x;
        let Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        let Img = document.createElement('img'); Img.src = './Vistas/Modulos/Img/' + Cancion.foto; Img.width = 100;
        Celda.appendChild(Img)

        Celda = document.createElement("td"); Celda.id = "celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        let Span= document.createElement("Span"); Span.innerText = Cancion.nombre;
        Celda.appendChild(Span);

        Celda = document.createElement("td"); Celda.id = "celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        Span= document.createElement("Span"); Span.innerText = Cancion.idCompositores;
        Celda.appendChild(Span);

        Celda = document.createElement("td"); Celda.id="celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        Span= document.createElement("Span"); Span.innerText = Cancion.idCantaAutores;
        Celda.appendChild(Span);

        Celda = document.createElement("td"); Celda.id = "celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        Span= document.createElement("Span"); Span.innerText = Cancion.idGenero;
        Celda.appendChild(Span);

        Celda = document.createElement("td"); Celda.id = "celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        Span= document.createElement("Span"); Span.innerText = Cancion.idDisquera;
        Celda.appendChild(Span);

        Celda = document.createElement("td"); Celda.id = "celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        Span= document.createElement("Span"); Span.innerText = Cancion.duracion;
        Celda.appendChild(Span);

        Celda = document.createElement("td"); Celda.id = "celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        Span= document.createElement("Span"); Span.innerText = Cancion.costo;
        Celda.appendChild(Span);

        Celda = document.createElement("td"); Celda.id = "celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        Span= document.createElement("Span"); Span.innerText = Cancion.precio;
        Celda.appendChild(Span);

        Celda = document.createElement("td"); Celda.id = "celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        Span= document.createElement("Span"); Span.innerText = Cancion.existencias;
        Celda.appendChild(Span);

        Celda = document.createElement("td"); Celda.id = "celda" + x;
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Celda);
        Span= document.createElement("Span"); Span.innerText = Cancion.idioma;
        Celda.appendChild(Span);

        let Btns = document.createElement("td"); Btns.id = "celdaBtns";
        Ren = document.getElementById("ren" + x);
        Ren.appendChild(Btns);

        let Div = document.createElement("div"); Div.id="divHerram";
        Btns.appendChild(Div);

        let IconoEdit = document.createElement("i"); IconoEdit.className="bi bi-pencil-square"; IconoEdit.id="iconoEdit";
        let LinkEdit = document.createElement('a'); LinkEdit.href="#"; LinkEdit.id=Cancion._id.$oid; LinkEdit.className="botonEdit"; LinkEdit.setAttribute("data-bs-toggle", "modal"); LinkEdit.setAttribute("data-bs-target", "#exampleModal");
        LinkEdit.appendChild(IconoEdit);
        Div.appendChild(LinkEdit);

        let IconoDel = document.createElement("i"); IconoDel.className="bi bi-trash"; IconoDel.id="iconoElim";
        let LinkDel = document.createElement('a'); LinkDel.href = "#"; LinkDel.id = Cancion._id.$oid; LinkDel.className = "botonElim";
        LinkDel.appendChild(IconoDel);
        Div.appendChild(LinkDel);
        x++
    })
}

function obtenerBotonClicked(e){
    e.preventDefault();
    const IconoSel =e.target;
    console.log("obtiene el icono seleccionado que lanzó el evento:", IconoSel);
    const LinkSel = e.target.parentElement;
    console.log("obtiene el contenedor padre del icono seleccionado, en este caso es el link:", LinkSel);
    
    if (e.target.parentElement.classList.contains('botonElim')) { 
        const idC= e.target.parentElement.id;
        console.log("idProducto bd", idC);
        deleteBD(idC);
    }
    if (e.target.parentElement.classList.contains('botonEdit')) {
        const idC= e.target.parentElement.id
        console.log("idProducto editar", idC)
        let miproducto=buscarPorIDdb(idC)
    }
}

function deleteBD(idC){
    let url = new URL('http://localhost/musica/driverCancion.php/');
    url.searchParams.set('_id', idC);
    console.log("url",url.toString());
    console.log("recibido",idC);
    fetch(url,{ method: "DELETE", headers: { 'Content-Type' : 'application/x-www-form-urlencoded'}})
    .then(function(res){ return res.json()})
    .then(function(datos){
        console.log(datos)
        Swal.fire('Eliminado')
        setTimeout(function() { location.reload(); },4000);
    })
    .catch(console.error);
}

function buscarPorIDdb(idC){
    let url = new URL('http://localhost/musica/driverCancion.php/');
    url.searchParams.set('_id', idC);
    console.log("url",url.toString())
    console.log("recibido en la funcion",idC)
    fetch(url,{ method:"GET", headers: { 'Content-Type': 'application/x-www-form-urlencoded'}})
    .then(function(res){ return res.json()})
    .then(function(res){
        console.log(res)
        var objJS=convertirJSON(res)
        console.log("OBJETO JS",objJS)
        mostrarCanModalUpdate(objJS)
    })                                                  
    .catch(console.error);        
}

function convertirJSON(datos){
    console.log("llegó datos",datos)
    var myJSON = JSON.stringify(datos); 
    console.log("myJson",myJSON)
    //alert (myJSON)
    var objJS = JSON.parse(myJSON)
    //alert (obj.marca)
    return objJS;
}

function mostrarCanModalUpdate(Cancion){
    console.log("indice desde modal",Cancion.nombre)
    document.getElementById('txtId').value=Cancion._id.$oid;
    document.getElementById('txtfoto').value=Cancion.foto;
    document.getElementById('txtnombre').value=Cancion.nombre;
    document.getElementById('selectCom').value=Cancion.idCompositores;
    document.getElementById('selectCanAutor').value=Cancion.idCantaAutores;
    document.getElementById('selectGenero').value=Cancion.idGenero;
    document.getElementById('selectDisquera').value=Cancion.idDisquera;
    document.getElementById('txtduracion').value=Cancion.duracion;
    document.getElementById('txtcosto').value=Cancion.costo;
    document.getElementById('txtprecio').value=Cancion.precio;
    document.getElementById('txtexistencias').value=Cancion.existencias;
    document.getElementById('txtidioma').value=Cancion.idioma;
}