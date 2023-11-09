<!-- Adicionando JQuery -->
    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#logradouro,#logradouro2").val("");
                $("#bairro,#bairro2").val("");
                $("#cidade,#cidade2").val("");
                $("#uf,#uf2").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep,#cep2").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#logradouro,#logradouro2").val("...");
                        $("#bairro,#bairro2").val("...");
                        $("#cidade,#cidade2").val("...");
                        $("#uf,#uf2").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#logradouro,#logradouro2").val(dados.logradouro);
                                $("#bairro,#bairro2").val(dados.bairro);
                                $("#cidade,#cidade2").val(dados.localidade);
                                $("#uf,#uf2").val(dados.uf);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>