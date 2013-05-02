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
    <?php foreach ($faixas as $i=>$v){?>
    <option value="<?php echo $v['id_graduacao']; ?>"><?php echo $v['faixa'];?></option>
    <?php }?>
</select>

<div class="editar">

</div>