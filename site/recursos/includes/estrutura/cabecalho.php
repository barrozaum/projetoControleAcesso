<?php
include_once './controle/validar_secao.php';
//lembre-se não pode alterar a ordem do menu
// cada código representa uma parte do menu
?>

<div class="page-header">
    <div class="mainbox col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0"> <!-- div que posiciona o formulário na tela -->
        <div class="row">
            <div class="col-lg-2 col-lg-offset-0 text-center">
                <a href="inicial.php">
                    <img src="recursos/imagens/estrutura/logo.jpg" height="76px" alt="logo cliente" title="logo da prefeitura">
                </a>
            </div>
            <div class="col-lg-9 col-lg-offset-0 ">
                <nav class="navbar navbar-default nav-justified" role="navigation">
                    <!-- Brand and toggle get grouped for better mobile display -->

                    <div class="navbar-header ">
                        <a class="navbar-brand" href="inicial.php">CODENI</a>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse ">
                        <ul class="nav navbar-nav ">

                            <li class="dropdown"><a href="cadastro_secretaria.php" >SECRETARIA</a></li>
                            <li class="dropdown"><a href="cadastro_usuario.php" >USUARIO</a></li>

                            <li class="dropdown"><a href="logout.php" >SAIR</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>
</div>
<hr />
