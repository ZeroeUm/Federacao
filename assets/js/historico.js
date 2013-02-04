/* 
 * 2013-02-02
 * @author Humberto
 */
$(document).ready(function(){
    $('#situacao').prop('disabled',true);
    
    $('#filiais').empty();
    $('#filiais').append(new Option("Escolha um instrutor","#",true,true) );
    $('#filiais').prop('disabled',true);
    
    $('#federados').empty();
    $('#federados').append(new Option("Escolha uma situação","#",true,true));
    $('#federados').prop('disabled',true);
    
    $('#situacao').val("#");
    
    $("#instrutores").val("#");
    
    $("#resultado").css("display","none");
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
                $('#filiais').prop('disabled',false);
                
                $('#situacao').val("#");
                $('#situacao').prop('disabled',true);
                
                $("#federados").empty();
                $('#federados').append(new Option("Escolha uma situação","#",true,true));
                $('#federados').prop('disabled',true);
                
                $("#resultado").css("display","none");
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
        
        $("#resultado").css("display","none");
        
        $('#federados').prop('disabled',true);
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
                    $("#resultado").css("display","none");
                    $("#federados").empty();
                    $("#federados").append(new Option("Escolha um federado","#",true,true));
                    $('#federados').prop('disabled',false);
                    $.each(federados,function(federado,prop){
                        $("#federados").append(new Option($('<div/>').html(prop.nome).text(),prop.id));
                    })
                    $("#federados").val("#");
                }
            })
        }
            
    })
    $('#federados').change(function (){
        
    })
})


