/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * Marcos
 */


$(document).ready(function(){
    $("select[name=instrutor]").change(function(){
        beforeSend:$("select[name=filial]").html('<option value="0">Carregando...</option>');
    $("select[name=status]").html('<option value="">Aguardando Filial...</option>');
        var instrutor = $("#instrutor").val(); // Pega o valor selecionado
        //alert(instrutor); //Só para debugg da variavel
        $('#filial').load('getFiliais/'+instrutor); //controller onde está chamando a função
    });
    
    /*
    $("select[name=filial]").change(function(){
        beforeSend:$("#federado").html('<h1>Carregando...</h1>');
    var filial = $("#filial").val(); // Pega o valor selecionado
         alert(filial); //Só para debugg da variavel
        $('#federado').load('getInscrito/'+filial); //controller onde está chamando a função          
        complete:$("#federado").html($tmp);
    });
    */
   
    $("select[name=filial]").change(function(){
        var filiais = $("#filial").val();
        //alert(filiais); //Só para debugg da variavel
        if (filiais !=-"#")
        {
            $.ajax({
                type: "POST",              
                data: "federado="+filiais,
                url: "getInscrito/"+filiais,
                datatype: 'json',
                success: function(federado)
                {
                    if (federado != null){
                        // alert("yes");
                        $("#resultado").css("display","block");
                        $("#nomeFederado").val($('<div/>').html(federado.nome).text());
                    }else{
                        $("#resultado").css("display","none");
                    }
                        
                }
            })
        }
    })
    
    
});

/*
 *   
    $("select[name=federado]").change(function (){
        var fed = $("#federado").val();
        if (fed !== "#")
        {
            $.ajax({
                type: "POST",
                data: "federado="+fed,
                url: "getFederado/"+fed,
                datatype: 'json',
                success: function(federado)
                {
                    $("#resultado").css("display","block");
                    $("#nomeFederado").val($('<div/>').html(federado.nome).text());
 */
