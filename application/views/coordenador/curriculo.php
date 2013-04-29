<script>
    $(document).ready(function(){
        $('#faixas').click(function(){
        
        id_graduacao = $('#faixas').val();
       
        $.ajax({
            type:"POST",
            url:"/coordenador/ajax_curriculo/"+id_graduacao,
            data:id_graduacao,
            datatype:"html",
            success: function(data)
            {
              $('.editar').html(data)
              
            },
            error: function(){
                $('.mostrar_professores').html('Não encontrado nenhum instrutor');
            }
        })
        })
    })
</script>

<label>Selecione uma faixa</label>
<select id="faixas" name="faixas">
    <option value="1">Branca</option>
    <option value="2">Amarela</option>
</select>

<div class="editar">

</div>