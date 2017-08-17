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
    <form  method="post" id="form_cadastro" action="recursos/includes/cadastrar/cadastra_secretaria.php">    
        <div class="mainbox col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0"> <!-- div que posiciona o formulário na tela -->
            <div class="well"><!-- div que coloca a cor no formulário -->
                <div class="panel panel-default">
                    <!-- INICIO Dados do imóvel -->
                    <div class="panel-heading text-center">CADASTRO SECRETARIA</div>
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
                            <div class="col-sm-3">
                                <?php
                                //   INPUT -                              
                                criar_input_select("ANDAR", "andar", "andar", array('required' => 'true'), func_ordem_andar());
                                ?>
                            </div>
                            <div class="col-sm-9">
                                <?php
                                //   INPUT -                              
                                criar_input_text("SECRETARIA", "secretaria", "secretaria", array('required' => 'true', 'placeholder' => 'INFORME A SECRETARIA'), '');
                                ?>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-4 ">
                                <?php
                                //   INPUT -                              
                                criar_input_text('Telefone(fixo)', 'telefone_fixo', 'telefone_fixo', array('required' => 'true', 'maxlength' => '10', 'placeholder' => '(xx) xxxx-xxxx ', 'onkeypress' => 'return SomenteNumero(event)'), '');
                                ?>
                            </div>
                        </div>
                        <hr />

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
    include_once '../funcoes/function_secretaria.php';
    try {
        $codigo = $_POST['codigo'];
        $query = findbycode($pdo, $codigo);
        $dados = $query->fetch();
    } catch (Exception $e) {
        print $e->getMessage();
    }
    ?>


    <form method="post" id="form_alterar" action="recursos/includes/alterar/alterar_secretaria.php">    

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">ALTERAR SECRETARIA</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="alt_msg_erro">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <?php
                    //   INPUT -                              
                    criar_input_hidden("id_secretaria", array("required" => "true"), $dados['id_secretaria'], "");
                    criar_input_select("ANDAR", "alt_andar", "alt_andar", array('required' => 'true'), func_ordem_andar($dados['numero_andar']));
                    ?>
                </div>
                <div class="col-sm-9">
                    <?php
                    //   INPUT - Codigo Bairro                             
                    criar_input_text('Secretaria', 'alt_secretaria', 'alt_secretaria', array('required' => 'true', 'maxlength' => '30', 'placeholder' => 'Informe o Nome do Origem'), $dados['descricao_secretaria'], 'Conter no Minimo 3 caracteres [a-z A-Z]');
                    ?>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-4 ">
                    <?php
                    //   INPUT -                              
                    criar_input_text('Telefone(fixo)', 'alt_telefone_fixo', 'alt_telefone_fixo', array('required' => 'true', 'maxlength' => '10', 'placeholder' => '(xx) xxxx-xxxx ', 'onkeypress' => 'return SomenteNumero(event)'), $dados['telefone']);
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
    include_once '../funcoes/function_secretaria.php';
    try {
        $codigo = $_POST['codigo'];
        $query = findbycode($pdo, $codigo);
        $dados = $query->fetch();
    } catch (Exception $e) {
        print $e->getMessage();
    }
    ?>


    <form method="post" id="form_alterar" action="recursos/includes/excluir/excluir_secretaria.php">    

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">EXCLUIR SECRETARIA</h4>
        </div>

        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div id="exc_msg_erro">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <?php
                    //   INPUT -                              
                    criar_input_hidden("id_secretaria", array("required" => "true"), $dados['id_secretaria'], "");
                    criar_input_text("Andar", "exc_andar", "exc_andar", array("readonly" => "true", "required" => "true"), func_descricao_andar($dados['numero_andar']))
                    ?>
                </div>
                <div class="col-sm-9">
                    <?php
                    //   INPUT - Codigo Bairro                             
                    criar_input_text('Secretaria', 'exc_secretaria', 'exc_secretaria', array('required' => 'true', 'maxlength' => '30', 'placeholder' => 'Informe o Nome do Origem'), $dados['descricao_secretaria'], 'Conter no Minimo 3 caracteres [a-z A-Z]');
                    ?>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-4 ">
                    <?php
                    //   INPUT -                              
                    criar_input_text('Telefone(fixo)', 'exc_telefone_fixo', 'exc_telefone_fixo', array('required' => 'true', 'maxlength' => '10', 'placeholder' => '(xx) xxxx-xxxx ', 'onkeypress' => 'return SomenteNumero(event)'), $dados['telefone']);
                    ?>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-danger" >Excluir</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
        </div>
    </form>

    <?php
}
?>