$(function () {

    $(document).on("change", "#id_andar", function (e) {
        e.preventDefault();

        $.post("recursos/includes/funcoes/function_secretaria.php",
                {acao: "listar_andar", codigo: $(this).val()},
        function (valor) {
            $("#id_secretaria").html(valor);
        }
        )


    });

    $(document).on('click', '#cadastro_acesso', function (e) {
        e.preventDefault();

//       campos formulario
        var data_visita = $('#id_data_visita').val();
        var hora_chegada = $('#id_hora_chegada').val();
        var nome_completo = $('#id_nome_completo').val();
        var tipo_doc = $('#id_tipo_doc').val();
        var complemento_doc = $('#id_complemento_doc').val();
        var telefone_fixo = $('#id_telefone_fixo').val();
        var telefone_celular = $('#id_telefone_celular').val();
        var andar = $('#id_andar').val();
        var secretaria = $('#id_secretaria').val();
        var assunto = $('#id_assunto').val();
        var autorizado = $('#id_autorizado').val();
        
//       mensagem de erro
        var msg = "";
        
        if(data_visita.length !== 8){
            msg += "DATA VISITA INVÁLIDA !!! <BR />";
        }
        if(hora_chegada.length !== 5){
            msg += "HORA VISITA INVÁLIDA !!! <BR />";
        }
        if(nome_completo.length < 3 || nome_completo.length > 50){
            msg += "NOME INVÁLIDO !!! <BR />";
        }
        if(tipo_doc === ""){
            msg += "TIPO DOC INVÁLIDO !!! <BR />";
        }
        if(complemento_doc.length < 3 || complemento_doc.length > 50){
             msg += "COMPLEMENTO DOCUMENTO INVÁLIDO !!! <BR />";
        }
        if(telefone_fixo.length < 10 && telefone_celular < 10){
            msg += "POR FAVOR INFORME AO MENOS UM TELEFONE !!! <br />"; 
        }
        if(andar === ""){
            msg += "POR FAVOR INFORME O ANDAR !!! <br />";
        }
        
        if(secretaria === ""){
            msg += "POR FAVOR INFORME A SECRETARIA !!! <br />";
        }
        
        if(assunto.length < 3 || assunto.length > 50){
            msg += "POR FAVOR INFORME ASSUNTO !!! <br />";
        }
        
        if(autorizado === ""){
            msg += "POR FAVOR INFORME ATORIZAÇÃO !!! <br />";
        }
        
        if(msg !== ""){
            $('#msg_erro').html("<div class='alert alert-danger'>"+msg+"</div>");
            return false;
        }else{
           $('#form_cadastro').submit();
        }

    });

});