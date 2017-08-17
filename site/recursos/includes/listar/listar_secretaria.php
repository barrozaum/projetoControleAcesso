<?php
include_once '../estrutura/controle/validar_secao.php';
include_once '../funcoes/function_andar.php';
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

                        <th>Andar</th>
                        <th>Secretaria</th>
                        <th>Telefone</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // chamo a conexao com o banco de dados
                    include_once '../estrutura/conexao/conexao.php';
                    include_once '../funcoes/function_secretaria.php';
                    $query = find_all_secretaria($pdo);
                    //loop para listar todos os dados encontrados
                    for ($i = 0; $dados = $query->fetch(); $i++) {
                        ?>   	


                        <tr>
                            <td><?php echo func_descricao_andar($dados['numero_andar']); ?></td>
                            <td><?php echo $dados['descricao_secretaria']; ?></td>
                            <td><?php echo $dados['telefone']; ?></td>
                            <td><a href="#" id="editar" data-id="<?php echo $dados['id_secretaria']; ?>"><img src="recursos/imagens/estrutura/alterar.png" height="20px;" alt="alterar"></a></td>
                            <td><a href="#" id="excluir" data-id="<?php echo $dados['id_secretaria']; ?>"><img src="recursos/imagens/estrutura/lixeira.png" height="20px;" alt="excluir"></a></td>
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
