const form = document.getElementById("tab1")
const nombre = document.getElementById("nombre")
const precio = document.getElementById("precio")
const descripcion = document.getElementById("descripcion")
const imagen = document.getElementById("imagen")
const categoria = document.getElementById("categoria")
const letras = new RegExp('^[a-zA-Z\s]{2,254}');

form.addEventListener("submit", e=>{
    if(nombre.value.length == 0){
        alert("El nombre es obligatorio")
        e.preventDefault()
        return false;
    }
    if(precio.value.length == 0){
        alert("El precio es obligatori")
        e.preventDefault()
        return false;
    }
    if(descripcion.value.length == 0){
        alert("La descripcion es obligatoria")
        e.preventDefault()
        return false;
    }
    if(imagen.value.length == 0){
        alert("Selecciona una imagen")
        e.preventDefault()
        return false;
    }
    if(categoria.value.length == 0){
        alert("Selecciona una categoria")
        e.preventDefault()
        return false;
    }else{
            document.form.submit()     
    }
})


                    