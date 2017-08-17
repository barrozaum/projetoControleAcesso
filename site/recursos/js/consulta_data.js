$(function () {

    $(document).on('click', '#id_consulta_data_carga', function (e) {
        e.preventDefault();

        var data_inicial = $("#id_dt_inicial").val();
        var data_final = $("#id_dt_final").val();

        $.ajax({
            method: "post",
            url: "recursos/includes/consulta/consulta_data.php",
            data: {
                id: 1,
                data_inicial: data_inicial,
                data_final: data_final
            },
            success: function (data) {
               $("#listar").html(data);
            }, error: function (erro) {
                console.log(erro.responseText);
            }

        });

    });


});