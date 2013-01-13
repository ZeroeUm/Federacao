/* 
 * @author Humberto
 */
$(document).ready(function(){
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
                $.each(filiais,function(filial,prop){
//                    var opt = $('<option />');
//                    opt.attr("value",prop.id);
//                    opt.attr("label",prop.nome);
                    $('#filiais').append(new Option($('<div/>').html(prop.nome).text(),prop.id) );
                })
            }
        })
    })
})
