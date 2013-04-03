/* 
 * 2013-02-14
 * @author Humberto
 */
$(document).ready(function () {
    var id = $("#ultimo").val();
    $("#adicionar").click(function () {
        var novaLinha = "<tr>";
            novaLinha += "<td style='text-align: center'>"+id;
            novaLinha += "<td style='text-align: center'><select class='span2' name='modalidade["+id+"]' id='modalidade"+id+"' disabled>"+modalidade(id)+"</select></td>";
            novaLinha += "<td style='text-align: center'><select class='span3' id='novoItem"+id+"' name='novoItem[]'>"+itensModalidade(1)+"</select></td>";
            novaLinha += "<td style='text-align: center'><input type='text' id='novoTamanho[]' name='novoTamanho[]' value='' class='span1' /></td>";
            novaLinha += "<td style='text-align: center'><input type='text' id='novaQuantidade[]' name='novaQuantidade[]' value='' class='span1' /></td>";
            novaLinha += "<td style='text-align: center'>";
            novaLinha += "<a href='#' class='deletar' style='color:red; font-size=22px; text-weight:bold'>&times;</a>";
            novaLinha += "</td>";
            novaLinha += "</tr>";
            
            id++;
            $("#corpo").append(novaLinha);
    })
    
    $(".deletar").live("click",function(){
        $(this).parent().parent().remove();
    })
    
    function itensModalidade(modalidade)
    {
        var select = "#novoItem"+id;
        $.ajax({
            type:"POST",
            url:"../itensModalidade/"+modalidade,
            data:"id="+modalidade,
            datatype:"json",
            success: function(itens)
            {
                $.each(itens,function (item,prop){
                    $(select).append( new Option( $('<div/>').html(prop.descricao).text(),prop.id ) );
                })
            }
        })
    }
    
    function modalidade(id)
    {
        var select = "#modalidade"+id;
        $.ajax({
            type: "POST",
            url: "../modalidades",
            datatype: "json",
            success: function(modalidade)
            {
                $.each(modalidade,function(i,prop){
                    if(prop.id == "1")
                        $(select).append( new Option( $("<div/>").html(prop.nome).text(),prop.id,true,true ) );
                    else
                        $(select).append( new Option( $("<div/>").html(prop.nome).text(),prop.id ) );
                })
            }
        })
    }
})


