<?php
include_once '../estrutura/controle/validar_secao.php';
include_once '../funcoes/funcaoCriacaoInput.php';
?>
<form  method="post" action="#">    
    <div class="mainbox col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0"> <!-- div que posiciona o formulário na tela -->
        <div class="well"><!-- div que coloca a cor no formulário -->
            <div class="panel panel-default">
                <!-- INICIO Dados do imóvel -->
                <div class="panel-heading text-center">CONSULTA DATA CARGA PROCESSO</div>
                <div class="panel-body">
                    <!-- inicio dados inscrição-->
                    <div class="row">
                        <div class="col-sm-6">
                            <?php
                            criar_input_data('Data Inicial', 'dt_inicial', 'dt_inicial', array('required' => 'true', 'placeholder' => '00/00/0000'), '', 'somente numeros');
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <?php
                            criar_input_data('Data Final', 'dt_final', 'dt_final', array('required' => 'true', 'placeholder' => '00/00/0000'), date('d/m/Y'), 'somente numeros');
                            ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-success" id="id_consulta_data_carga">Procurar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>