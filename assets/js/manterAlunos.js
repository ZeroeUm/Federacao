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
        //alert(instrutor); //S� para debugg da variavel
        $('#filial').load('getFilial/'+instrutor); //controller onde est� chamando a fun��o
    });
    
    $("select[name=filial]").change(function(){
        beforeSend:$("select[name=status]").html('<option value="0">Carregando...</option>');
    var filial = $("#filial").val(); // Pega o valor selecionado
        // alert(filial); //S� para debugg da variavel
        $('#status').load('getStatus/'+filial); //controller onde est� chamando a fun��o          
    });
    
    $("select[name=status]").change(function(){
        beforeSend:$("select[name=federado]").html('<option value="0">Carregando...</option>');
    var filial = $("#filial").val(); // Pega o valor selecionado do campo filial
        var status = $("#status").val(); // Pega o valor selecionado do campo status    
        //alert(filial+status); //S� para debugg da variavel
        $('#federado').load('getAluno/'+filial+"/"+status); //controller onde est� chamando a fun��o
    });
    
    
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
                    $(".senha").attr('href','/instrutores/enviarSenha/'+fed+"/1");
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
                    
                     $("#imprimir").addClass('btn btn-success');
                    $("#alterar").addClass('btn btn-success');
                }
            })
        }
    })
});
    