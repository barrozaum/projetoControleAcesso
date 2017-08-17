<?php
include_once '../estrutura/controle/validar_secao.php';
include_once '../funcoes/function_consulta_data.php';
include_once '../funcoes/function_secretaria.php';
include_once '../funcoes/funcaoData.php';


$data_inicial = dataAmericano($_POST['data_inicial']);
$data_final = dataAmericano($_POST['data_final']);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Controle Acesso</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            $(document).ready(function () {
                $('#table').DataTable();
            });
        </script>
    </head>
    <body>

        <div style="overflow: auto; max-width: 100%;">
            <table id="table" class="table table-hover " cellspacing="0" width="100%">
                <thead>
                    <tr>

                        <th>DATA</th>
                        <th>HORA</th>
                        <th>NOME</th>
                        <th>SECRETARIA</th>
                        <th>ASSUNTO</th>
                        <th>AUTORIZADO</th>
                        <th>OBSERVACAO</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // chamo a conexao com o banco de dados
                    include_once '../estrutura/conexao/conexao.php';
                    include_once '../funcoes/function_consulta_data.php';
                    $query = busca_por_data($pdo, $data_inicial, $data_final);
                    //loop para listar todos os dados encontrados
                    for ($i = 0; $dados = $query->fetch(); $i++) {
                        if($dados['autorizado'] == 1){
                            $autorizado = "SIM";
                        }else{
                            $autorizado = "NÃO";
                        }
                        ?>   	


                        <tr>
                            <td><?php echo dataBrasileiro($dados['data_visita']);   ?></td>
                            <td><?php echo substr($dados['hora_visita'], 0, 5); ?></td>
                            <td><?php echo $dados['nome_completo']; ?></td>
                            <td><?php echo findDescription($pdo, $dados['secretaria']);?></td>
                            <td><?php echo $dados['assunto']; ?></td>
                            <td><?php echo $autorizado; ?></td>
                            <td><?php echo $dados['observacao']; ?></td>
                        </tr>


                        <?php
                    }
                    $pdo = null;
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
