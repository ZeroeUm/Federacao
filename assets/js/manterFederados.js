/* 
 * @author Humberto
 */
$(document).ready(function(){
    $('#situacao').prop('disabled',true);
    
    $('#filiais').empty();
    $('#filiais').append(new Option("Escolha um instrutor","#",true,true) );
    
    $('#federados').empty();
    $('#federados').append(new Option("Escolha uma situação","#",true,true));
    
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
                $("#federados").empty();
                $.each(filiais,function(filial,prop){
                    $('#filiais').append(new Option($('<div/>').html(prop.nome).text(),prop.id) );
                })
            }
        })
    })
    $('#filiais').change(function (){
        $('#situacao').prop('disabled',false);
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
                    $.each(federados,function(federado,prop){
                        $("#federados").append(new Option($('<div/>').html(prop.nome).text(),prop.id));
                    })
                }
            })
        }
            
    })
})
