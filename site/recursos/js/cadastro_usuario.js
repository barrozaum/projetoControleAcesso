$(function () {

    $(document).on('click', '#btn_cadastro', function (e) {
        e.preventDefault();
        var colaborador_login = $("#id_login_colaborador").val();
        var colaborador_nome = $("#id_colaborador_nome").val();
        var colaborador_senha = $("#id_colaborador_senha").val();
        var colaborador_conf_senha = $("#id_colaborador_conf_senha").val();

        var msg = "";

        if (colaborador_login.length < 3) {
            msg += "POR FAVOR ENTRE COM LOGIN VÁLIDO, (3,50) !!! <br />";
        }

        if (colaborador_nome.length < 3) {
            msg += "POR FAVOR ENTRE COM NOME COMPLETO VÁLIDO, (3,50) !!! <br />";
        }

        if (colaborador_senha.length < 3) {
            msg += "POR FAVOR ENTRE COM SENHA VÁLIDO, (3,50) !!! <br />";
        }

        if (colaborador_conf_senha.length < 3) {
            msg += "POR FAVOR ENTRE COM CONFIRMAÇÃO DE SENHA VÁLIDO, (3,50) !!! <br />";
        }

        if (colaborador_senha !== colaborador_conf_senha) {
            msg += "SENHAS NÃO CONFEREM !!! <br />";

        }


        if (msg !== "") {
            $("#msg_erro").html("<div class='alert alert-danger'>" + msg + "</div>");
        } else {
            $("#form_cadastro").submit();
        }
    });


    $(document).on('click', '#editar', function (e) {
        e.preventDefault();

        $(".modal-content").html('');
        $(".modal-content").addClass('loader');
        $("#dialog-example").modal('show');
        $.post('recursos/includes/formulario/formulario_usuario.php',
                {id: 1,
                    codigo: $(this).attr('data-id')
                },
        function (html) {
            $(".modal-content").removeClass('loader');
            $(".modal-content").html(html);
        }
        );
    });
    
    $(document).on('click', '#excluir', function (e) {
        e.preventDefault();

        $(".modal-content").html('');
        $(".modal-content").addClass('loader');
        $("#dialog-example").modal('show');
        $.post('recursos/includes/formulario/formulario_usuario.php',
                {id: 2,
                    codigo: $(this).attr('data-id')
                },
        function (html) {
            $(".modal-content").removeClass('loader');
            $(".modal-content").html(html);
        }
        );
    });

    $(document).on('click', '#btn_alterar', function (e) {
        e.preventDefault();
        var alterar_senha = $("#id_alterar_senha").val();
        var colaborador_login = $("#id_alt_login_colaborador").val();
        var colaborador_nome = $("#id_alt_colaborador_nome").val();
        var colaborador_senha = $("#id_alt_colaborador_senha").val();
        var colaborador_conf_senha = $("#id_alt_colaborador_conf_senha").val();

        var msg = "";


        if (colaborador_login.length < 3) {
            msg += "POR FAVOR ENTRE COM LOGIN VÁLIDO, (3,50) !!! <br />";
        }

        if (colaborador_nome.length < 3) {
            msg += "POR FAVOR ENTRE COM NOME COMPLETO VÁLIDO, (3,50) !!! <br />";
        }

        if (alterar_senha === "1") {

            if (colaborador_senha.length < 3) {
                msg += "POR FAVOR ENTRE COM SENHA VÁLIDO, (3,50) !!! <br />";
            }

            if (colaborador_conf_senha.length < 3) {
                msg += "POR FAVOR ENTRE COM CONFIRMAÇÃO DE SENHA VÁLIDO, (3,50) !!! <br />";
            }

            if (colaborador_senha !== colaborador_conf_senha) {
                msg += "SENHAS NÃO CONFEREM !!! <br />";

            }
        }


        if (msg !== "") {
            $("#alt_msg_erro").html("<div class='alert alert-danger'>" + msg + "</div>");
        } else {
            $("#form_alterar").submit();
        }
    });

    $(document).on('change', "#id_alterar_senha", function (e) {
        var valor = $("#id_alterar_senha").val();
        if (valor == 1) {
            $("#id_alt_colaborador_senha").removeAttr("readonly");
            $("#id_alt_colaborador_conf_senha").removeAttr("readonly");
        } else {
            $("#id_alt_colaborador_senha").attr("readonly", true).val("");
            $("#id_alt_colaborador_conf_senha").attr("readonly", true).val("");
        }
    });
});