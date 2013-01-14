/* 
 * @author Humberto
 */
$(document).ready(function(){
    $('#situacao').prop('disabled',true);
    
    $('#filiais').empty();
    $('#filiais').append(new Option("Escolha um instrutor","#",true,true) );
    
    $('#federados').empty();
    $('#federados').append(new Option("Escolha uma situação","#",true,true));
    
    $('#situacao').val("#");
    
    $("#instrutores").val("#");
    
    $('#instrutores').change(function (){
        var instrutor = $("#instrutores").val();
        $.ajax({
            type: "POST",
            data: "instrutor="+instrutor,
            url: "getFiliais/"+instrutor,
            datatype: 'json',
            success: function(filiais)
            {
                
                $("#filiais").empty();
                $("#filiais").append(new Option("Escolha uma filial","#",true,true));
                
                $("#federados").empty();
                $('#federados').append(new Option("Escolha uma situação","#",true,true));
                
                $.each(filiais,function(filial,prop){
                    $('#filiais').append(new Option($('<div/>').html(prop.nome).text(),prop.id) );
                })
               
            }
        })
    })
    $('#filiais').change(function (){
        $('#situacao').prop('disabled',false);
        $('#situacao').empty();
        
        $('#situacao').append(new Option("Escolha uma situação","#",true,true));
        $('#situacao').append(new Option("Inativo","0"));
        $('#situacao').append(new Option("Ativo","1"));
    })
    $('#situacao').change(function (){
        var filial = $('#filiais').val();
        var situacao = $('#situacao').val();
        
        if (situacao !== "")
        {
            $.ajax({
                type: "POST",
                data: "filial="+filial+"situacao="+situacao,
                url: "getFederados/"+filial+"/"+situacao,
                datatype: 'json',
                success: function(federados)
                {
                    $("#federados").empty();
                    $("#federados").append(new Option("Escolha um federado","#",true,true));
                    $.each(federados,function(federado,prop){
                        $("#federados").append(new Option($('<div/>').html(prop.nome).text(),prop.id));
                    })
                    $("#federados").val("#");
                }
            })
        }
            
    })
    $('#federados').change(function (){
        var fed = $("#federados").val();
        if (fed !== "")
        {
            $.ajax({
                type: "POST",
                data: "federados="+fed,
                url: "getFederado/"+fed,
                datatype: 'json',
                success: function(federado)
                {
                    $("#resultado").css("display","block");
                    $("#nomeFederado").val($('<div/>').html(federado.nome).text());
                    $("#dataNasc").val($('<div/>').html(federado.dtNasc).text());
                    $("#idade").val($('<div/>').html(federado.idade).text());
                    $("#telefone").val($('<div/>').html(federado.telefone).text());
                    $("#email").val($('<div/>').html(federado.email).text());
                    $("#celular").val($('<div/>').html(federado.celular).text());
                    $("#sexo").val($('<div/>').html(federado.sexo).text());
                    $("#escolaridade").val($('<div/>').html(federado.escolaridade).text());
                    $("#nacionalidade").val($('<div/>').html(federado.nacionalidade).text());
                    $("#faixa").val($('<div/>').html(federado.faixa).text());
                    
                    $("#imprimir").attr("href", "imprimirFederado/"+fed);
                    $("#alterar").attr("href","alterarFederado/"+fed);
                }
            })
        }
    })
})
