<script>
    $(document).ready(function(){
        $('.selec_modalidade').click(function(){
       
       var id = $('.selec_modalidade').val();
       
       $.ajax({
            type:"POST",
            url:"/coordenador/ajax_professores_filial/"+id,
            data:id,
            datatype:"html",
            success: function(data)
            {
              $('.mostrar_professores').html(data)
              
            },
            error: function(){
                $('.mostrar_professores').html('Não encontrado nenhum instrutor');
            }
        })
        })
    })
</script>

Informe uma filial:<br> 
<select class="selec_modalidade">
 <?php foreach ($categorias as $r=>$d){?>
    
    <option name="id_modalidade" value="<?php echo $d['id'] ?>"> <?php echo $d['nome'] ;?></option>
<?php } ?> 
</select>

<div class="mostrar_professores">
</div>