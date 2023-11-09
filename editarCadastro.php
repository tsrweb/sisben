<?php
session_start();
$logado = $_SESSION['nome'];
$tpLogado = $_SESSION['tipo'];
if ((!isset($_SESSION['nome']))) {
    header('location: index.php');
}

$idUsuario = $_GET["idUsuario"];

require "conecta.php";

$sql = $link->query("SELECT * FROM tb_usuario WHERE id_usuario = '$idUsuario' ");

while($reg = $sql->fetch_array()){

$nome = $reg['nm_usuario'];
$cpf = $reg['nu_cpf'];
$rg = $reg['nu_rg'];
$pis = $reg['nu_pis'];
$fone = $reg['fn_usuario'];
$dataNascimento = $reg['dt_nascimento'];
$profissao = $reg['nm_profissao'];
$renda = $reg['nu_renda'];
$cep = $reg['nu_cep'];
$logradouro = $reg['nm_logradouro'];
$numero = $reg['nu_numero'];
$bairro = $reg['nm_bairro'];
$cidade = $reg['nm_cidade'];
$uf = $reg['sl_estado'];
$tipoImovel = $reg['tp_imovel'];
$saneamento = $reg['tp_saneamento'];
$nDependentes = $reg['nu_dependentes'];
$nDeficiente = $reg['nu_deficiente'];
$senha = $reg['pw_senha'];
      };
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
    <title>sisBen</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
    <link rel="icon" href="img/favicon.ico">

    <!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
    <!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body>

<?php include "navBarUser.php";?>

    <div class="row">
      <h2>SisBen</h2>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Cadastro</h3>
              </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-6 col-md-offset-3">
                  <div class="alert alert-danger text-center" role="alert">
                    <strong>Atenção!</strong> Informações sujeita a confirmações por nossos assistentes sociais atravez de solicitações de documentos e comprovantes.</div>
                   </div>
                 </div>
            	<form method="post" action="updateCadastro?idUsuario=<?=$idUsuario?>">
            		<div class="row">
            			<div class="col-md-4">
				  		    	<div class="form-group">
    				    			<label for="nome">Nome Completo:</label>
    				    			<input type="text" class="form-control" id="nome" name="nome"  value="<?=$nome?>" autocomplete="off" required>
				  				  	</div>
										</div>
				       <div class="col-md-3">
    				  		<div class="form-group">
    						    <label for="cpf">CPF:</label>
    						    <input type="text" class="form-control" id="cpf" name="cpf" value="<?=$cpf?>" autocomplete="off" placeholder="000.000.000-00" required>
				  				</div>
								</div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="rg">RG:</label>
                <input type="text" class="form-control" id="rg" name="rg" value="<?=$rg?>" autocomplete="off" required>
                  </div>
                </div>
				    <div class="col-md-3">
				  		<div class="form-group">
						    <label for="pis">PIS:</label>
						    <input type="text" class="form-control" id="pis" name="pis" value="<?=$pis?>" autocomplete="off">
				  				</div>
								</div>
				</div><!-- /row -->
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="fone">Telefone:</label>
                <input type="text" class="form-control" id="fone" name="fone" value="<?=$fone?>" placeholder="(00) 0000-0000" autocomplete="off">
                  </div>
                </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="dataNascimento">Data de Nascimento:</label>
                <input type="text" class="form-control" id="dataNascimento" name="dataNascimento" value="<?=$dataNascimento?>" autocomplete="off">
                  </div>
                </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="profissao">Profissão:</label><br />
                  <select class="form-control" name="profissao" required>
                    <option value="<?=$profissao?>"><?=$profissao?></option>
                    <option value="Pensionista">Pensionista</option>
                    <option value="CLT">CLT</option>
                    <option value="Do Lar">Do Lar</option>
                    <option value="Desenpregado">Desenpregado</option>
                  </select>
                </div>
              </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="renda">Renda Familiar:</label>
                    <div class="input-group">
                      <span class="input-group-addon">R$</span>
                      <input type="text" class="form-control" aria-describedby="basic-addon2" name="renda" value="<?=$renda?>">
                    </div>
                  </div>
                </div>
            </div><!-- /row -->
				<div class="row">
          <div class="col-md-2">
				  	<div class="form-group">
					    <label for="cep">CEP:</label>
					    <input type="text" class="form-control" id="cep" name="cep" placeholder="00000-000" value="<?=$cep?>" required>
				  	</div>
          </div>
        		<div class="col-md-5">
				  		<div class="form-group">
						    <label for="logradouro">Logradouro:</label>
						    <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?=$logradouro?>">
				  				</div>
      					</div>
          		<div class="col-md-1">
		  		  		<div class="form-group">
				  		    <label for="numero">Número:</label>
				  		    <input type="text" class="form-control" id="numero" name="numero" autocomplete="off" value="<?=$numero?>" required>
				  				</div>
    						</div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="bairro">Bairro:</label>
                  <input type="text" class="form-control" id="bairro" name="bairro" value="<?=$bairro?>">
                  </div>
                 </div>
              	</div><!-- /row -->
    			   <div class="row">
          		<div class="col-md-4">
    		    		<div class="form-group">
    						    <label for="cidade">Cidade:</label>
    						    <input type="text" class="form-control" id="cidade" name="cidade" value="<?=$cidade?>">
    				  				</div>
        					</div>
            	<div class="col-md-1">
  				  		<div class="form-group">
  						    <label for="uf">Estado:</label>
  						    <input type="text" class="form-control text-uppercase" id="uf" name="uf" maxlength="2" value="<?=$uf?>">
  				  				</div>
          				</div>
            	 </div><!-- /row -->
          <div class="row">
            <div class="col-md-2">
              <div class="form-group">
                <label for="tipoImovel">Tipo do Imóvel:</label><br />
                  <select class="form-control" name="tipoImovel" required>
                    <option value="<?=$tipoImovel?>"><?=$tipoImovel?></option>
                    <option value="Própria">Própria</option>
                    <option value="Alugado">Alugado</option>
                    <option value="Doação">Doação</option>
                    <option value="Invasão">Invasão</option>
                    <option value="Usocapião">Usocapião</option>
                  </select>
                </div>
              </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="saneamento">Saneamento:</label><br />
                  <select class="form-control" name="saneamento" required>
                    <option value="<?=$saneamento?>"><?=$saneamento?></option>
                    <option value="Nenhum">Nenhum</option>
                    <option value="Esgoto">Esgoto</option>
                    <option value="Água Encanada">Água Encanada</option>
                    <option value="Esgoto e Água Encanada">Esgoto e Água Encanada</option>
                  </select>
                  </div>
                </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="nDependente">Número de Dependentes:</label>
                <input type="text" class="form-control text-uppercase" id="nDependente" name="nDependente" value="<?=$nDependentes?>" maxlength="2">
                </div>
              </div>
          </div><!-- /row -->
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="nDeficiente">Há Pessoas com Necessidades Especiais?</label><br>
                <label class="radio-inline">
                <input type="radio" id="inlineRadio1" value="Sim">Sim</label>
                <label class="radio-inline">
                <input type="radio" name="nDeficiente" id="inlineRadio2" value="Não">Não</label>
                </div>
              </div>
          </div><!-- /row -->
            <div class="row">
              <div class="col-md-5">
                <div class="form-group form-inline">
                  <label for="nDeficiente">Caso Sim, Quantos?</label>
                  <input type="text" class="form-control text-uppercase" id="nDeficiente" name="nDeficiente" value="<?=$nDeficiente?>" maxlength="2" style="width: 100px;">
                </div>
              </div>            
          </div><!-- /row -->
			 <div class="row">
     		<div class="col-md-3">
			   <div class="form-group">
				  <label for="senha">Senha:</label>
				   <input type="password" class="form-control" id="senha" name="senha" value="<?=$senha?>" required>
							</div>
        		</div>
        	<div class="col-md-3">
				 		<div class="form-group">
					    <label for="confirSenha">Confirme a Senha:</label>
					    <input type="password" class="form-control" id="confirSenha" name="confirSenha" value="<?=$senha?>" required>
				 				</div>
        	   	</div>
            </div><!-- /row -->
            <div class="row">
              <div class="col-md-4">
                <div class="alert alert-danger" role="alert"><strong>Atenção!</strong> Campos em branco não será alterado.</div>
              </div>
            </div>
          <div class="row">
            <div class="col-md-4">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente editar este cadastro?');">Salvar</button>
                <button type="button" class="btn btn-danger" onclick="window.history.back();">Voltar</button>
             </div>
            </div>
				  </form>
               </div>
              </div>
             </div>    
            </div><!-- /row -->
          </div><!-- /container -->

<!-- footer -->
<hr class="featurette-divider">
  <div class="row" style="margin-right: 0px;">
    <div class="col-md-3 col-md-offset-9">
      &copy; 2017 Equipe Umbrella Corporation
        </div>
          </div><!-- /footer -->

  </div> <!--  /container -->

  	<?php include "buscarCep.php"; ?>
  	<!-- Validação de campos -->
  	<script type="text/javascript" src="js/JavaScript.js"></script>
  	<script type="text/javascript" src="js/jquery-1.11.3.js"></script>
  	<script type="text/javascript">validar();</script>
    <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>