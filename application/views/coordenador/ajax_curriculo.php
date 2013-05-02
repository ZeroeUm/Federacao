<form action="<?php echo base_url();?>coordenador/alterar_curriculo" method="post">
    <input type="hidden" class="id_graduacao" value="<?php echo $graduacao; ?>">
<?php foreach ($movimentos as $i=>$v){ ?>
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
   <div class="row-fluid novo_campo">
        
        </div>
    </div>  
    <a href="#" class="incluir_novo" onclick="incluir_novo()">Incluir novo</a>
    <input type="submit" value="Salvar">
</form>

<script>
    function incluir_novo(){
        $('input').after('<input type="text" name="novo_campo" value="">\n')
      }
     function remover_campo(id){
         $('.'+id).remove();
     }
     
</script>