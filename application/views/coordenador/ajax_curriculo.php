<form action="<?php echo base_url(); ?>coordenador/alterar_curriculo" method="post">
    <input type="hidden" class="id_graduacao" name="id_graduacao" value="<?php echo $graduacao; ?>">
    <?php foreach ($movimentos as $i => $v) { ?>
        <div class="row-fluid">
            <div class="<?php echo $v['id_movimento_faixa']; ?>">
                <div class="span3">
                    <?php echo $v['nome_movimento']; ?>
                </div>
                <div class="span2">
                    <a href="#" class="remover" onclick="remover_campo(<?php echo $v['id_movimento_faixa'] ?>)">Remover</a>
                </div>
            </div>

        </div>


    <?php } ?>
    <div class="row-fluid">

        <div class="novo_campo">
            
        </div>
        
    </div>
   
    
    <div class="row-fluid">
       
        <div class="span1">
            <input type="submit" class="btn btn-primary" value="Salvar" style="margin-top: 0px;"/>
        </div>
         <div class="span2">
        <input type="button" class="btn incluir_novo" value="Incluir novo" onclick="incluir_novo()"/>
        </div>
    </div>
</form>

<script>
    function incluir_novo(){
        
        $('.novo_campo').append('<input type="text" name="descricao[]" class="input-large" /><br>');
    }
    function remover_campo(id){
         $.ajax({
            type:"POST",
            url:"/coordenador/ajax_remover_curriculo/"+id,
            data:id_graduacao,
            datatype:"html",
            success: function(data)
            {
              alert(data);
              $('.'+id).remove();
              
            },
            error: function(){
                alert('Erro ao realizar o ajax');
            }
        })
        
        
    }
     
</script>