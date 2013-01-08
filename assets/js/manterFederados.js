/* 
 * @author Humberto
 */
$(function(){
    $("select[name=instrutores]").change(function(){
        instrutor = $(this).val();
        
        if(instrutor === '')
            return false;
        
        resetaDrop('filiais');
        
        $.getJSON(path + '/administrador/getFiliais/' + instrutor, function (data){
            var option = new Array();
            
            $.each(data, function(i,obj){
                option[i] = document.createElement('option');
                $( option[i] ).attr( {value:obj.id} );
                $( option[i] ).append( obj.nome );
                
                $("select[name='filiais']").append(option[i]);
            });
        });
    });
});

function resetaDrop(nome){
    $("select[name='"+nome+"']").empty();
    var option = document.createElement('option');
    $(option).attr({value:''});
    $(option).append('Escolha');
    $("select[name='"+nome+"']").append(option);
}

