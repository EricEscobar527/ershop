const form = document.getElementById("reg_adm")
const correo = document.getElementById("correo")
const contraseña = document.getElementById("contraseña")
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
    if(!regexEmail.test(correo.value)){
        alert("El correo es incorrecto")
        e.preventDefault()
        return false;
    }  else{
            document.form.submit()     
    }
})
