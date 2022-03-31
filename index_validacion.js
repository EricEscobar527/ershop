const form = document.getElementById("index")
const correo = document.getElementById("correo")
const contraseña = document.getElementById("contraseña")
const select = document.getElementById("select")
const letras = new RegExp('^[A-Z]+$', 'i');
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
    if(select.value.length == 0){
        alert("Selecciona un tipo de usuario")
        e.preventDefault()
        return false;
    }
    if(!regexEmail.test(correo.value)){
        alert("El correo es incorrecto")
        e.preventDefault()
        return false;
    }  else{
            document.form.submit()     
    }
})
