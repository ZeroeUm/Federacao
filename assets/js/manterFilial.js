/* 
 * 2013-01-24
 * @author Humberto 
 */
$(document).ready(function () {
    $("#filiais").change(function (){
        var fil = $("#filiais").val();
        if(fil != "#")
        {
            $.ajax({
                type: "POST",
                url: "getFilial/"+fil,
                data: "filial="+fil,
                datatype: "json",
                success: function (filial)
                {
                    $("#resultado").css("display","block");
                    $("#nome").val($('<div/>').html(filial.nome).text());
                    $("#telefone").val($('<div/>').html(filial.telefone).text());
                    $("#fax").val($('<div/>').html(filial.fax).text());
                    $("#email").val($('<div/>').html(filial.email).text());
                    $("#representante").val($('<div/>').html(filial.representante).text());
                    $("#instrutor").val($('<div/>').html(filial.instrutor).text());
                    $("#logradouro").val($('<div/>').html(filial.logradouro).text());
                    $("#numero").val($('<div/>').html(filial.numero).text());
                    $("#complemento").val($('<div/>').html(filial.complemento).text());
                    $("#bairro").val($('<div/>').html(filial.bairro).text());
                    $("#cidade").val($('<div/>').html(filial.cidade).text());
                    $("#uf").val($('<div/>').html(filial.uf).text());
                    
                    $("#imprimir").attr('href','imprimirFilial/'+fil);
                    $("#alterar").attr('href','alterarFilial/'+fil);
                }
            });
        }
    });
});
