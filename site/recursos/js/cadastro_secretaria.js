$(function () {

    $(document).on('click', '#btn_cadastro', function (e) {
        e.preventDefault();
        var andar = $("#id_andar").val();
        var secretaria = $("#id_secretaria").val();
        var msg = "";
        if (andar === "") {
            msg += "SELECIONE O ANDAR !!! <BR />";
        }
        if (secretaria.length < 3) {
            msg += "POR FAVOR ENTRE COM SECRETÁRIA VÁLIDA, (3,50)";
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
        $.post('recursos/includes/formulario/formulario_secretaria.php',
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
        $.post('recursos/includes/formulario/formulario_secretaria.php',
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
        var andar = $("#id_alt_andar").val();
        var secretaria = $("#id_alt_secretaria").val();
        var msg = "";
        if (andar === "") {
            msg += "SELECIONE O ANDAR !!! <BR />";
        }
        if (secretaria.length < 3) {
            msg += "POR FAVOR ENTRE COM SECRETÁRIA VÁLIDA, (3,50)";
        }

        if (msg !== "") {
            $("#alt_msg_erro").html("<div class='alert alert-danger'>" + msg + "</div>");
        } else {
            $("#form_alterar").submit();
        }
    });
});