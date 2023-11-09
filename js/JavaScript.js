var senha = document.getElementById("senha");
var confirSenha = document.getElementById("confirSenha");

	function validatePassword(){
  		if(senha.value != confirSenha.value){
  			confirSenha.setCustomValidity("Senhas diferentes!");
  	}else{
    confirSenha.setCustomValidity('');
  }
};

senha.onchange = validatePassword;
confirSenha.onkeyup = validatePassword;

function validar(){

		jQuery("#fone,#fone2")
        .mask("(99) 9999-9999?9")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });

        jQuery("#cnpj").mask("99.999.999/9999-99");
        jQuery("#cep,#cep2").mask("99999-999");
        jQuery("#cpf").mask("999.999.999-99");
        jQuery("#dataNascimento").mask("99/99/9999");
}