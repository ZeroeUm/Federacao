/* 
 * 2013-03-05
 * @author Humberto
 */
$(document).ready(function() {
    $.ajax({
        type:"POST",
        data:"modalidade=1",
        datatype:"json",
        url:"getFilialModalidade/1",
        success: function(filiais)
        {
            $.each(filiais,function(filial,prop){
                $("#filial").append(new Option($("<div/>").html(prop.nome).text(),prop.id));
            })
        }
    })
})

