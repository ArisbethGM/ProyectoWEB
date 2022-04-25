const formulario = document.getElementById('inicio');
const inputs = document.querySelectorAll('#inicio input');

const expresiones = {
    matricula:/^[z]{1}[S]{1}[\d]{7}$/, //Letra z minuscula, S mayuscula y 7 numeros 
	psw: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
 
}

const campos = {
    matricula:false,
    psw:false,
}

const validarCampos = (e) =>{
    switch(e.target.name){
        case "matricula":

            expresionesObligatorio(expresiones.matricula, e.target, 'matricula'); 
        break;
            
        case "psw":
            expresionesObligatorio(expresiones.psw, e.target, 'psw');  
        break;
    } 
}

inputs.forEach((input) => {

    input.addEventListener('keyup', validarCampos);
    input.addEventListener('blur', validarCampos);
 });
 
 formulario.addEventListener('submit', function(e){

    e.preventDefault();
    formulario.action = "../php/postLogin.php";
    formulario.submit(); 
    formulario.reset(); 
    
 });
 
