const form = document.getElementById("form_actualizar")
const nombre = document.getElementById("nombre")
const precio = document.getElementById("precio")
const descripcion = document.getElementById("descripcion")
const imagen = document.getElementById("imagen")
const categoria = document.getElementById("categoria")
const letras = new RegExp('^[A-Z]+$', 'i');
let regexEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

form.addEventListener("submit", e=>{
    if(nombre.value.length == 0){
        alert("El nombre es obligatorio")
        e.preventDefault()
        return false;
    }
    if(precio.value.length == 0){
        alert("Agrega un precio")
        e.preventDefault()
        return false;
    }
    if(descripcion.value.length == 0){
        alert("La descripción es obligatoria")
        e.preventDefault()
        return false;
    }
    if(imagen.value.length == 0){
        alert("Agrega una imagen")
        e.preventDefault()
        return false;
    }
    if(categoria.value.length == 0){
        alert("Escoge una categoria")
        e.preventDefault()
        return false;
    } else{
            document.form.submit()     
    }
})
