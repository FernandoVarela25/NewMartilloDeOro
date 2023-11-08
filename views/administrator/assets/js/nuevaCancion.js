document.addEventListener('DOMContentLoaded', cargarSelects);
document.getElementById('miArchivo').addEventListener('change', validar);
document.getElementById('selectCom').addEventListener('change',ObtCom);
document.getElementById('selectCanAutor').addEventListener('change', ObtCanAutor);
document.getElementById('selectGenero').addEventListener('change',ObtGen);
document.getElementById('selectDisquera').addEventListener('change',ObtDis);

let bandera=0;
let frm=document.getElementById('formCan');
var arrayCom=[], arrayCanAutor=[], arrayGen=[], arrayDis=[];

function cargarSelects(){
    Compositores();
    CantaAutores();
    Generos();
    Disqueras();
}

frm.addEventListener('submit', addProd);
function addProd(e){
    e.preventDefault();
    if (bandera==1){
        SubirArchivo()
    }    
    let respuesta=document.getElementById("resp")
    var miformData = new FormData(frm);
    const endPoint="http://localhost/musica/driverCancion.php";
    fetch(endPoint,{ method:"POST", body:miformData})
    .then(resp => resp.json())
    .then(data => {
        console.log(data)
        if (data.mensaje=='Error'){
            respuesta.innerHTML=`<div class="alert alert-danger" role="alert">Error al agregar la nueva cancion!</div>`;
        } else {
            respuesta.innerHTML=`<div class='alert alert-success alert-dismissible fade show' role='alert'>Nueva cancion agregada!</div>`;
        }
    })
}


function validar(e){
    var imagen=this.files[0]
    console.log('archivo imagen',imagen)
    console.log('Tipo',imagen.type)
    console.log('Tamaño',imagen.size)
    
    if(imagen.type == "image/jpeg" || imagen.type == "image/png"){
        var hiddenfoto = document.createElement('input');
        hiddenfoto.type = 'hidden';
        hiddenfoto.id = 'txtNomImgOculta'
        hiddenfoto.name='foto'
        hiddenfoto.value = imagen.name
        document.getElementById('divFoto').appendChild(hiddenfoto)
        bandera=1
    } else {
        const mensaje = document.createElement('p');
        mensaje.innerText="El archivo debe ser formato JPG o PNG Seleccione otro archivo";
        mensaje.id='mensaje';
        mensaje.className='mensajeCorrecto';
        document.getElementById('divFoto').appendChild(mensaje)
        setTimeout(function() {
            document.getElementById('mensaje').remove();
        }, 9000);
        bandera=0
    }
}

function SubirArchivo(){
    console.log("ban", bandera)
    if (bandera==1){
        console.log("sube archivo")
        const cajaImg=document.getElementById('miArchivo')
        const endPoint="./vistas/modulos/subirArchivo.php";  
        const miformData= new FormData();
        console.log("archi",cajaImg.files)
        miformData.append("archivoImagen", cajaImg.files[0])
        fetch(endPoint,{
            method: "post",
            body:miformData
        })
        .then(function(res){ return res.json()})
        .then(function(datos){ console.log(datos)})
    }
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

function ObtCom(){
    let Compositor=document.getElementById('selectCom')
    var selectedValue = Compositor.options[Compositor.selectedIndex].value;
    alert(selectedValue)
    HiddenCom(selectedValue)
}

function HiddenCom(Compositor){
    var hiddenInput = document.createElement('input')
    hiddenInput.type = 'hidden'
    hiddenInput.name="_id"
    hiddenInput.id = 'txtCom'
    hiddenInput.value = Compositor
    document.getElementById('HiddenCom').appendChild(hiddenInput)
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

function ObtCanAutor(){
    let CanAutor=document.getElementById('selectCanAutor')
    var selectedValue = CanAutor.options[CanAutor.selectedIndex].value;
    alert(selectedValue)
    HiddenCanAutor(selectedValue)
}

function HiddenCanAutor(CantaAutor){
    var hiddenInput = document.createElement('input')
    hiddenInput.type = 'hidden'
    hiddenInput.name="_id"
    hiddenInput.id = 'txtCanAutor'
    hiddenInput.value = CantaAutor
    document.getElementById('HiddenCanAutor').appendChild(hiddenInput)
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

function ObtGen(){
    let Genero=document.getElementById('selectGenero')
    var selectedValue = Genero.options[Genero.selectedIndex].value;
    alert(selectedValue)
    HiddenGen(selectedValue)
}

function HiddenGen(Genero){
    var hiddenInput = document.createElement('input')
    hiddenInput.type = 'hidden'
    hiddenInput.name="_id"
    hiddenInput.id = 'txtGen'
    hiddenInput.value = Genero
    document.getElementById('HiddenGen').appendChild(hiddenInput)
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

function ObtDis(){
    let Disquera=document.getElementById('selectDisquera')
    var selectedValue = Disquera.options[Disquera.selectedIndex].value;
    alert(selectedValue)
    HiddenCom(selectedValue)
}

function HiddenDis(Disquera){
    var hiddenInput = document.createElement('input')
    hiddenInput.type = 'hidden'
    hiddenInput.name="_id"
    hiddenInput.id = 'txtDis'
    hiddenInput.value = Disquera
    document.getElementById('HiddenDis').appendChild(hiddenInput)
}


function convertirJSONarray(datos){
    var arrays = []
    datos.forEach(function(item) { arrays.push(item)})
    return arrays;
}