<?php
include_once '../estrutura/controle/validar_secao.php';
include_once '../funcoes/funcaoCriacaoInput.php';
date_default_timezone_set('America/Sao_Paulo');
?>
<form  method="post" action="recursos/includes/cadastrar/cadastrar_acesso.php" id="form_cadastro">    
    <div class="mainbox col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0"> <!-- div que posiciona o formulário na tela -->
        <div class="well"><!-- div que coloca a cor no formulário -->
            <div class="panel panel-default">
                <!-- INICIO Dados do imóvel -->
                <div class="panel-heading text-center">CADASTRO VISITANTE</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="msg_erro">
                                <?php
                                if (isset($_SESSION['MSG_RETORNO'])) {
                                    echo $_SESSION['MSG_RETORNO'];
                                    unset($_SESSION['MSG_RETORNO']);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <?php
                            //   INPUT -                              
                            criar_input_data('Data Visita', 'data_visita', 'data_visita', array('readonly' => 'true', 'maxlength' => '12', 'placeholder' => 'DD/MM/YYYY'), date("d/m/y"));
                            ?>
                        </div>
                        <div class="col-sm-6 text-center">
                            <?php
                            //   INPUT -                              
                            criar_input_text('Hora Chegada', 'hora_chegada', 'hora_chegada', array('readonly' => 'true', 'maxlength' => '11', 'placeholder' => 'HH:mm'), date("H:i"));
                            ?>
                        </div>
                    </div> 
                    <hr />
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            //   INPUT -                              
                            criar_input_text('Nome Completo', 'nome_completo', 'nome_completo', array('required' => 'true', 'maxlength' => '50', 'placeholder' => 'NOME VISITANTE'), '');
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <?php
                            //   INPUT -                              
                            criar_input_select("Tipo Doc", "tipo_doc", "tipo_doc", array('required' => 'true'), array('' => 'SELECIONE O TIPO', '1' => 'CPF', '2' => 'IDENTIDADE', '3' => "OUTROS"));
                            ?>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            //   INPUT -                              
                            criar_input_text('Complemento Documento', 'complemento_doc', 'complemento_doc', array('required' => 'true', 'maxlength' => '50', 'placeholder' => 'COMPLEMENTO DOCUMENTO '), '');
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 ">
                            <?php
                            //   INPUT -                              
                            criar_input_text('Telefone(fixo)', 'telefone_fixo', 'telefone_fixo', array('required' => 'true', 'maxlength' => '10', 'placeholder' => '(xx) xxxx-xxxx ', 'onkeypress' => 'return SomenteNumero(event)'), '');
                            ?>
                        </div>
                        <div class="col-sm-6 ">
                            <?php
                            //   INPUT - 
                            criar_input_text('Telefone(cel)', 'telefone_celular', 'telefone_celular', array('required' => 'true', 'maxlength' => '11', 'placeholder' => '(xx) x xxxx-xxxx  ', 'onkeypress' => 'return SomenteNumero(event)'), '');
                            ?>
                        </div>
                    </div> 
                    <hr />
                    <div class="row">
                        <div class="col-sm-3">
                            <?php
                            //   INPUT -                              
                            criar_input_select("ANDAR", "andar", "andar", array('required' => 'true'), array('' => 'SELECIONE O ANDAR', '1' => 'PRIMEIRO', '2' => 'SEGUNDO', '3' => "TERCEIRO"));
                            ?>
                        </div>
                        <div class="col-sm-9">
                            <?php
                            //   INPUT -                              
                            criar_input_select("SECRETARIA", "secretaria", "secretaria", array('required' => 'true'), array('' => 'SELECIONE PRIMEIRO O ANDAR'));
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            //   INPUT -                              
                            criar_input_text('Assunto', 'assunto', 'assunto', array('required' => 'true', 'maxlength' => '50', 'placeholder' => 'ASSUNTO DA VISITA'), '');
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <?php
                            //   INPUT -                              
                            criar_input_select("AUTORIZADO", "autorizado", "autorizado", array('required' => 'true'), array('' => 'SELECIONE AUTORIZAÇÃO', '1' => 'SIM', '0' => 'NÃO'));
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            //   INPUT -                              
                            criar_textarea("OBSERVAÇÃO", "observacao", "observacao", '', array('maxlength' => '240'));
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-success" id="cadastro_acesso">Cadastrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>