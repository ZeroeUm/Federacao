/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Marcos
 */


$(document).ready(function() {
    $("select[name=instrutor]").change(function() {
        $("#mensagem").hide();
        $("#resultado").empty();
        beforeSend:$("select[name=filial]").html('<option value="">Carregando...</option>');
        //$("select[name=filial]").html('<option value="">Aguardando Filial...</option>');
        var instrutor = $("#instrutor").val(); // Pega o valor selecionado
        //alert(instrutor); //Só para debugg da variavel
        $('#filial').load('getFiliais/' + instrutor); //controller onde está chamando a função
    });



    $("select[name=filial]").change(function() {
        $("#mensagem").hide();
        $("#resultado").empty();
        var filiais = $("#filial").val();
        //alert(filiais); //Só para debugg da variavel
        if (filiais !== "#")
        {
            $.ajax({
                type: "POST",
                data: "federado=" + filiais,
                url: "getInscrito/" + filiais,
                datatype: 'json',
                success: function(federado)
                {
                    if (federado === null) {
                        $("#resultado").css("display", "none");
                        $("#mensagem").show("slow").html('<h3> Desculpe, sem Resultado para esta pesquisa.<h3>');

                    }
                    if (federado !== null) {
                        // alert("yes");
                        $("#mensagem").hide();
                        $("#resultado").empty();
                        $("#resultado").css("display", "block");

                        $.each(federado, function(i, value) {
                            $("#mensagem").show().html('<h3> Resultado<h3>');
                            $("<input type='text'/>").attr({
                                readonly: 'readonly'
                                        , class: 'span3'
                                        , value: federado[i].nome

                            }).appendTo("#resultado");
                            $("<br/>").appendTo("#resultado");

                        });


                    }

                }
            });
        }

    });
});
