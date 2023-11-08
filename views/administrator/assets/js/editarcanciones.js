document.addEventListener('DOMContentLoaded', cargarSelects);
document.getElementById("btnCan").addEventListener('click',enviarCambios);

let bandera=0;
var arrayCom=[], arrayCanAutor=[], arrayGen=[], arrayDis=[];

function cargarSelects(){
    Compositores();
    CantaAutores();
    Generos();
    Disqueras();
}

function enviarCambios(){
    var id=document.getElementById('txtId').value
    var foto=document.getElementById('txtfoto').value
    var nom=document.getElementById('txtnombre').value
    var idCom=document.getElementById('selectCom').value
    var idCA=document.getElementById('selectCanAutor').value
    var idG=document.getElementById('selectGenero').value
    var idD=document.getElementById('selectDisquera').value
    var dura=document.getElementById('txtduracion').value
    var cost=document.getElementById('txtcosto').value
    var precio=document.getElementById('txtprecio').value
    var exis=document.getElementById('txtexistencias').value
    var idi=document.getElementById('txtidioma').value

    let url = new URL('http://localhost/musica/driverCancion.php/');

    url.searchParams.set('_id',id);
    url.searchParams.set('foto',foto);
    url.searchParams.set('nombre',nom);
    url.searchParams.set('idCompositores',idCom);
    url.searchParams.set('idCantaAutores',idCA);
    url.searchParams.set('idGenero',idG);
    url.searchParams.set('idDisquera',idD);
    url.searchParams.set('duracion',dura);
    url.searchParams.set('costo',cost);
    url.searchParams.set('precio',precio);
    url.searchParams.set('existencias',exis);
    url.searchParams.set('idioma',idi);

    console.log("url",url.toString())
    fetch(url,{ method:"PUT", headers: { 'Content-Type': 'application/json'}})
    .then(function(res){ return res.json()})
    .then(function(res){
        console.log(res)
        Swal.fire('Actualizado')
        setTimeout(function() {
            location.reload();
        },4000);
    })
}


function Compositores(){
    const endPoint="http://localhost/musica/driverCompositores.php";
    fetch(endPoint,{ method: "GET", headers: { 'Content-Type': 'application/x-www-form-urlencoded'}})
    .then(function(res){ return res.json()})
    .then (function(res){ console.log('Compositores ',res); arrayCom=convertirJSONarray(res); llenarCom(arrayCom);})
    .catch(console.error);
}

function llenarCom(arrayCom){
    let selectCom = document.getElementById('selectCom')
    console.log(selectCom)
    arrayCom.forEach(function(Compositor){
        var option = document.createElement("option");
        option.innerHTML = Compositor.nombre;
        option.value = Compositor.nombre
        selectCom.appendChild(option);
    })
}


function CantaAutores(){
    const endPoint="http://localhost/musica/driverCantaAutor.php";
    fetch(endPoint,{ method: "GET", headers: { 'Content-Type': 'application/x-www-form-urlencoded'}})
    .then(function(res){ return res.json()})
    .then (function(res){ console.log('Canta-Autores ',res); arrayCanAutor=convertirJSONarray(res); llenarCanAutor(arrayCanAutor);})
    .catch(console.error);
}

function llenarCanAutor(arrayCanAutor){
    let selectCanAutor = document.getElementById('selectCanAutor')
    console.log(selectCanAutor)
    arrayCanAutor.forEach(function(CantaAutor){
        var option = document.createElement("option");
        option.innerHTML = CantaAutor.nombre;
        option.value = CantaAutor.nombre
        selectCanAutor.appendChild(option);
    })
}


function Generos(){
    const endPoint="http://localhost/musica/driverGenero.php";
    fetch(endPoint,{ method: "GET", headers: { 'Content-Type': 'application/x-www-form-urlencoded'}})
    .then(function(res){ return res.json()})
    .then (function(res){ console.log('Generos ',res); arrayGen=convertirJSONarray(res); llenarGen(arrayGen);})
    .catch(console.error);
}

function llenarGen(arrayGen){
    let selectGen = document.getElementById('selectGenero')
    console.log(selectGen)
    arrayGen.forEach(function(Genero){
        var option = document.createElement("option");
        option.innerHTML = Genero.nombre;
        option.value = Genero.nombre
        selectGen.appendChild(option);
    })
}


function Disqueras(){
    const endPoint="http://localhost/musica/driverDisquera.php";
    fetch(endPoint,{ method: "GET", headers: { 'Content-Type': 'application/x-www-form-urlencoded'}})
    .then(function(res){ return res.json()})
    .then (function(res){ console.log('Disqueras ',res); arrayDis=convertirJSONarray(res); llenarDis(arrayDis);})        
    .catch(console.error);
}

function llenarDis(arrayDis){
    let selectDis = document.getElementById('selectDisquera')
    console.log(selectDis)
    arrayDis.forEach(function(Disquera){
        var option = document.createElement("option");
        option.innerHTML = Disquera.nombrefiscal;
        option.value = Disquera.nombrefiscal
        selectDis.appendChild(option);
    })
}


function convertirJSONarray(datos){
    var arrays = []
    datos.forEach(function(item) { arrays.push(item)})
    return arrays;
}