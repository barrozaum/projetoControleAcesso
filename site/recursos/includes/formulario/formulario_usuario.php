<?php
include_once '../estrutura/controle/validar_secao.php';
include_once '../funcoes/funcaoCriacaoInput.php';
include_once '../funcoes/function_andar.php';

if (isset($_POST['id'])) {
    if ($_POST['id'] == 1) {
        form_alterar();
    } else if ($_POST['id'] == 2) {
        form_excluir();
    }
} else {
    form_cadastrar();
}
?>
<?php

function form_cadastrar() {
    ?>
    <form  method="post" id="form_cadastro" action="recursos/includes/cadastrar/cadastra_usuario.php">    
        <div class="mainbox col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0"> <!-- div que posiciona o formulário na tela -->
            <div class="well"><!-- div que coloca a cor no formulário -->
                <div class="panel panel-default">
                    <!-- INICIO Dados do imóvel -->
                    <div class="panel-heading text-center">CADASTRO USUARIO</div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
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
                        <!-- inicio dados inscrição-->
                        <div class="row">
                            <div class="col-sm-6 ">
                                <?php
                                //   INPUT -                              
                                criar_input_text('Login', 'login_colaborador', 'login_colaborador', array('required' => 'true', 'maxlength' => '50', 'placeholder' => 'INFORME O LOGIN'), '', 'minimo 3 caracteres');
                                ?>
                            </div>
                            <div class="col-sm-6 ">
                                <?php
                                //   INPUT -                              
                                criar_input_text('Nome Completo', 'colaborador_nome', 'colaborador_nome', array('required' => 'true', 'maxlength' => '50', 'placeholder' => 'INFORME O NOME DO COLABORDOR'), '', 'minimo 3 caracteres');
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <?php
                                criar_input_checkbox("Administrador", "perfil", "perfil");
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 ">
                                <?php
                                //   INPUT -                              
                                criar_input_password('Senha', 'colaborador_senha', 'colaborador_senha', array('required' => 'true', 'maxlength' => '50', 'placeholder' => 'INFORME SENHA'), '', 'minimo 3 caracteres');
                                ?>
                            </div>
                            <div class="col-sm-6 ">
                                <?php
                                //   INPUT -                              
                                criar_input_password('Conf Senha', 'colaborador_conf_senha', 'colaborador_conf_senha', array('required' => 'true', 'maxlength' => '50', 'placeholder' => 'CONFIRME SENHA'), '', 'minimo 3 caracteres');
                                ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-success" id="btn_cadastro">Cadastrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <?php
}
?>

<?php

function form_alterar() {
    include_once '../estrutura/conexao/conexao.php';
    include_once '../funcoes/function_usuario.php';
    try {
        $codigo = $_POST['codigo'];
        $query = findbycode($pdo, $codigo);
        $dados = $query->fetch();
    } catch (Exception $e) {
        print $e->getMessage();
    }

    if ($dados['perfil'] === "USUARIO") {
        $perfil_ativo = array("USUARIO" => "USUARIO", "ADMINISTRADOR" => "ADMINISTRADOR");
    } else {
        $perfil_ativo = array("ADMINISTRADOR" => "ADMINISTRADOR", "USUARIO" => "USUARIO");
    }
    ?>


    <form method="post" id="form_alterar" action="recursos/includes/alterar/alterar_usuario.php">    

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ALTERAR USUÁRIO</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="alt_msg_erro">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 ">
                    <?php
                    //   INPUT -                              
                    criar_input_hidden("id_usuario", array("required" => "true"), $dados['id_usuario'], "");
                    criar_input_text('Login', 'alt_login_colaborador', 'alt_login_colaborador', array('required' => 'true', 'maxlength' => '50', 'placeholder' => 'INFORME O LOGIN'), $dados['usuario'], 'minimo 3 caracteres');
                    ?>
                </div>
                <div class="col-sm-6 ">
                    <?php
                    //   INPUT -                              
                    criar_input_text('Nome Completo', 'alt_colaborador_nome', 'alt_colaborador_nome', array('required' => 'true', 'maxlength' => '50', 'placeholder' => 'INFORME O NOME DO COLABORDOR'), $dados['nome'], 'minimo 3 caracteres');
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <?php
                    criar_input_select('Alterar Senha', "alterar_senha", "alterar_senha", array(), array("0" => "NÃO", "1" => "SIM"));
                    ?>
                </div>
                <div class="col-sm-4">
                    <?php
                    criar_input_select('Administrador', "alterar_perfil", "alterar_perfil", array(), $perfil_ativo);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 ">
                    <?php
                    //   INPUT -                              
                    criar_input_password('Senha', 'alt_colaborador_senha', 'alt_colaborador_senha', array('readonly' => 'true', 'required' => 'true', 'maxlength' => '50', 'placeholder' => 'INFORME SENHA'), '', 'minimo 3 caracteres');
                    ?>
                </div>
                <div class="col-sm-6 ">
                    <?php
                    //   INPUT -                              
                    criar_input_password('Conf Senha', 'alt_colaborador_conf_senha', 'alt_colaborador_conf_senha', array('readonly' => 'true', 'required' => 'true', 'maxlength' => '50', 'placeholder' => 'CONFIRME SENHA'), '', 'minimo 3 caracteres');
                    ?>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-info" id="btn_alterar" >Alterar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
    </form>

    <?php
}
?>

<?php

function form_excluir() {
    include_once '../estrutura/conexao/conexao.php';
    include_once '../funcoes/function_usuario.php';
    try {
        $codigo = $_POST['codigo'];
        $query = findbycode($pdo, $codigo);
        $dados = $query->fetch();
    } catch (Exception $e) {
        print $e->getMessage();
    }
    ?>


    <form method="post" id="form_alterar" action="recursos/includes/excluir/excluir_usuario.php">    

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">EXCLUIR USUÁRIO</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6 ">
                    <?php
                    //   INPUT -                              
                    criar_input_hidden("id_usuario", array("required" => "true"), $dados['id_usuario'], "");
                    criar_input_text('Login', 'exc_login_colaborador', 'exc_login_colaborador', array("readonly" => "true", 'required' => 'true', 'maxlength' => '50', 'placeholder' => 'INFORME O LOGIN'), $dados['usuario'], 'minimo 3 caracteres');
                    ?>
                </div>
                <div class="col-sm-6 ">
                    <?php
                    //   INPUT -                              
                    criar_input_text('Nome Completo', 'exc_colaborador_nome', 'exc_colaborador_nome', array("readonly" => "true", 'required' => 'true', 'maxlength' => '50', 'placeholder' => 'INFORME O NOME DO COLABORDOR'), $dados['nome'], 'minimo 3 caracteres');
                    ?>
                </div>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-success" id="btn_danger" >Excluir</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
    </form>

    <?php
}
?>