/* 
 * @author Humberto
 */
$(document).ready(function(){
    $('#instrutores').change(function (){
        $("#filiais > option").remove();
        var instrutor = $("#instrutores").val();
        $.ajax({
            type: "POST",
            url: "getFiliais/"+instrutor,
            sucess: function(filiais)
            {
                $.each(filiais,function(id,nome){
                    var option = $('<option />')
                    option.val(id);
                    option.text(nome);
                    $("#filiais").append(option);
                })
            }
        })
    })
})
