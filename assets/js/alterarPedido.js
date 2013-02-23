/* 
 * 2013-02-14
 * @author Humberto
 */
$(document).ready(function () {
    var id = $("#ultimo").val();
    $("#adicionar").click(function () {
        var novaLinha = "<tr>";
            novaLinha += "<td style='text-align: center'>"+id;
            novaLinha += "<td style='text-align: center'><select name='modalidade["+id+"]' id='modalidade"+id+"' disabled>"+modalidade(id)+"</select></td>";
            novaLinha += "<td style='text-align: center'><select id='novoItem[]' name='novoItem[]'></select></td>";
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
    
    function modalidade(id)
    {
        var select = $("#modalidade"+id);
        
        $.ajax({
            type: "POST",
            url: "modalidades",
            datatype: "json",
            success: function(modalidade)
            {
                $.each(modalidade,function(i,v){
                    if(i == "1")
                        select.append(new Option($("<div/>").html(v.nome).text(),v.id,true,true));
                    else
                        select.append(new Option($("<div/>").html(v.nome).text(),v.id));
                })
            }
        })
    }
})


