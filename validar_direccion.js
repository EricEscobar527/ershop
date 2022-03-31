const form = document.getElementById("form_direccion")
const calle = document.getElementById("calle")
const colonia = document.getElementById("colonia")
const municipio = document.getElementById("municipio")
const estado = document.getElementById("estado")
const cp = document.getElementById("cp")
const numero = document.getElementById("numero")
const letras = new RegExp('^[a-zA-Z\s]{2,254}');

form.addEventListener("submit", e=>{
    if(calle.value.length == 0){
        alert("El calle es obligatoria")
        e.preventDefault()
        return false;
    }
    if(colonia.value.length == 0){
        alert("La colonia es obligatoria")
        e.preventDefault()
        return false;
    }
    if(municipio.value.length == 0){
        alert("El municipio es obligatorio")
        e.preventDefault()
        return false;
    }
    if(estado.value.length == 0){
        alert("El estado es obligatorio")
        e.preventDefault()
        return false;
    }
    if(cp.value.length == 0){
        alert("El codigo postal es obligatorio")
        e.preventDefault()
        return false;
    }
    if(numero.value.length == 0){
        alert("Escribe tu telefono")
        e.preventDefault()
        return false;
    }  
    if(!letras.test(calle.value)){
        alert("La calle solo debe contener letras")
        e.preventDefault()
        return false;
    }
    if(!letras.test(colonia.value)){
        alert("La colonia solo debe contener letras")
        e.preventDefault()
        return false;
    }
    if(!letras.test(municipio.value)){
        alert("El municipio solo debe contener letras")
        e.preventDefault()
        return false;
    }
    if(!letras.test(estado.value)){
        alert("El estado solo debe contener letras")
        e.preventDefault()
        return false;
    }else{
            document.form.submit()     
    }
})
