/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Marcos
 */


$(document).ready(function() {


    $("select[name=filial]").change(function() {
        $("#resultado").css("display", "none");
        $("#formulario").empty();
        var filiais = $("#filial").val();
        //alert(filiais); //S� para debugg da variavel
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
                        $("#resultado").hide();
                        $("#formulario").empty();
                        $("#mensagem").show("slow").html('<h3> Desculpe, sem Resultado para esta pesquisa.<h3>');

                    }
                    if (federado !== null) {
                        // alert("yes");
                        $("#mensagem").hide();
                        $("#formulario").empty();
                        $("#resultado").css("display", "block");


                        $("<input/>").attr({
                            type: 'label',
                            name: 'label',
                            id: 'nome',
                            value: 'Nome',
                            class: 'span3',
                            disabled: "disabled",
                            style: 'text-align: center;margin-right:2px;margin-left:3px;border:none;color: #FFF;background:#000;'
                        }).appendTo("#formulario");

                        $("<input/>").attr({
                            type: 'label',
                            name: 'label',
                            id: 'nome',
                            value: 'Faixa',
                            class: 'span3',
                            disabled: "disabled",
                            style: 'text-align: center;margin-right:2px;margin-left:3px;border:none;color: #FFF;background:#000;'
                        }).appendTo("#formulario");

                        $("<input/>").attr({
                            type: 'label',
                            name: 'label',
                            id: 'nome',
                            value: 'Filial',
                            class: 'span4',
                            disabled: "disabled",
                            style: 'text-align: center;margin-right:2px;margin-left:3px;border:none;color: #FFF;background:#000;'

                        }).appendTo("#formulario");
                        
                        
                        
                        $("<br/>").appendTo("#formulario");
                        $("<br/>").appendTo("#formulario");

                        $("<input/>").attr({'type':'hidden','name':'id_filial'}).val(filiais).appendTo("#formulario");
                            
                        $.each(federado, function(i, value) {
                            //$("#mensagem").show().html('<h3> Resultado<h3>');
                            $("<input type='text'/>").attr({
                                readonly: 'readonly'
                                        , class: 'span3'
                                        , value: federado[i].nome
                                        , style: 'margin-right:2px;margin-left:3px;'


                            }).appendTo("#formulario");
                            $("<input type='text'/>").attr({
                                readonly: 'readonly'
                                        , class: 'span3'
                                        , value: federado[i].faixa
                                        , style: 'margin-right:2px;margin-left:3px;'

                            }).appendTo("#formulario");
                            $("<input type='text'/>").attr({
                                readonly: 'readonly'
                                        , class: 'span4'
                                        , value: federado[i].filial
                                        , style: 'margin-right:2px;margin-left:3px;'

                            }).appendTo("#formulario");

                            $("<input/>").attr({
                                type: 'checkbox',
                                name: 'nodeCheck[]',
                                id: federado[i].id,
                                class: 'checkbox',
                                value: federado[i].id
                            }).appendTo("#formulario");

                            $("<br/>").appendTo("#formulario");
                        });
                    }



                    $("<input/>").attr({
                        type: 'submit',
                        name: 'cadastrar',
                        class: 'btn btn-primary',
                        value: 'Cadastrar Federados',
                        id: 'cad'

                    }).appendTo("#formulario");


                }
            });
        }

    });


});
