const form = document.getElementById("login_user")
const correo = document.getElementById("correo")
const contraseña = document.getElementById("contraseña")
const nombre = document.getElementById("nombre")
const apellido1 = document.getElementById("apellido_paterno")
const apellido2 = document.getElementById("apellido_materno")
const celular = document.getElementById("celular")
const calle = document.getElementById("calle")
const colonia = document.getElementById("colonia")
const municipio = document.getElementById("municipio")
const estado = document.getElementById("estado")
const cp = document.getElementById("cp")
const letras = new RegExp('^[a-zA-Z\s]{2,254}');
let regexEmail = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i

form.addEventListener("submit", e=>{
    if(correo.value.length == 0){
        alert("El correo es obligatorio")
        e.preventDefault()
        return false;
    }
    if(contraseña.value.length == 0){
        alert("La contraseña es obligatoria")
        e.preventDefault()
        return false;
    }
    if(nombre.value.length == 0){
        alert("El nombre es obligatorio")
        e.preventDefault()
        return false;
    }
    if(apellido1.value.length == 0){
        alert("El apellido paterno es obligatorio")
        e.preventDefault()
        return false;
    }
    if(apellido2.value.length == 0){
        alert("El apellido materno es obligatorio")
        e.preventDefault()
        return false;
    } 
    if(celular.value.length == 0){
        alert("El celular es obligatorio")
        e.preventDefault()
        return false;
    } 
    if(calle.value.length == 0){
        alert("La calle es obligatoria")
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
    if(!regexEmail.test(correo.value)){
        alert("El correo es incorrecto")
        e.preventDefault()
        return false;
    } 
    if(!letras.test(nombre.value)){
        alert("El nombre solo debe contener letras")
        e.preventDefault()
        return false;
    }  
    if(!letras.test(apellido1.value)){
        alert("El apellido paterno solo debe contener letras")
        e.preventDefault()
        return false;
    }  
    if(!letras.test(apellido2.value)){
        alert("El apellido materno solo debe contener letras")
        e.preventDefault()
        return false;
    }
    if(!letras.test(calle.value)){
        alert("El calle solo debe contener letras")
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
    }  else{
            document.form.submit()     
    }
})
