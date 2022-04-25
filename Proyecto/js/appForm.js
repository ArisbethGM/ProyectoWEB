
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');



const expresiones = {
    matricula:/^[z]{1}[S]{1}[\d]{7}$/, //Letra z minuscula, S mayuscula y 7 numeros 
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    apaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    amaterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	correo:/^((?!\.)[\w-_.]*[^.](@\w+)(\.\w+(\.\w+)?[^.\W]))$/,
    colonia:/^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    ciudad:/^[a-zA-ZÀ-ÿ\s]{1,40}$/,// Letras y espacios, pueden llevar acentos.
    codigo:/^\d{5}$/, // 5 digitos
    psw:/^[a-zA-ZÀ-ÿ0-9\s]{1,40}$/ // Letras y espacios, pueden llevar acentos y numeros. 
}


const campos = {
    matricula:false,
    nombre:false,
    apaterno:false,
    amaterno: false,
    correo:false,
    colonia:false,
    ciudad:false,
    codigo:false,
    psw:false
}

const validarFormulario = (e) =>{
    switch(e.target.name){
        case "matricula":

            validarCampoExpresionesObligatorio(expresiones.matricula, e.target, 'matricula'); 
        break;
            
        case "nombre":
            validarCampoExpresionesObligatorio(expresiones.nombre, e.target, 'nombre');  
        break;

        case "apaterno":
            validarCampoExpresionesObligatorio(expresiones.apaterno, e.target, 'apaterno');  
        break;

        case "amaterno":
            validarCampoExpresionesOpcional(expresiones.amaterno, e.target, 'amaterno');   
        break;

        case "correo":
            validarCampoExpresionesObligatorio(expresiones.correo, e.target, 'correo');  
        break;

        case "colonia":
            validarCampoExpresionesOpcional(expresiones.colonia, e.target, 'colonia');   
        break;

        case "codigo":
            validarCampoExpresionesOpcional(expresiones.codigo, e.target, 'codigo');   
        break;

        case "ciudad":
            validarCampoExpresionesOpcional(expresiones.ciudad, e.target, 'ciudad');   
        break;

        case "psw":
            validarCampoExpresionesObligatorio(expresiones.psw, e.target, 'psw');   
        break;
    } 
}

//Método para validar cada una de las expresiones SOLO PARA LAS QUE SON OBLIGATORIAS  
const validarCampoExpresionesObligatorio = (expresiones, input, campo) =>{

    if(expresiones.test(input.value)){
       
        document.getElementById(`formulario__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`formulario__${campo}`).classList.add('formulario__grupo-correcto');
        campos[campo] = true;

    }else{
        document.getElementById(`formulario__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`formulario__${campo}`).classList.remove('formulario__grupo-correcto');
       campos[campo] = false;
    } 
}



//Método para validar cada una de las expresiones SOLO PARA LAS QUE SON OPCIONAL 
const validarCampoExpresionesOpcional = (expresiones, input, campo) =>{

    if(expresiones.test(input.value)){

        document.getElementById(`formulario__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`formulario__${campo}`).classList.add('formulario__grupo-correcto');
        campos[campo] = true;

    }else{
       
        document.getElementById(`formulario__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`formulario__${campo}`).classList.remove('formulario__grupo-correcto');
  
      
       campos[campo] = false;
    } 
}



inputs.forEach((input) => {

   input.addEventListener('keyup', validarFormulario);
   input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', function(e){

    e.preventDefault();  
    formulario.action = "../php/post.php";
    formulario.submit();
    formulario.reset();  
    
});

