<form action="<?php echo base_url();?>coordenador/alterar_curriculo" method="post">
    <input type="hidden" class="id_graduacao" value="<?php echo $graduacao; ?>">
<?php foreach ($movimentos as $i=>$v){ ?>
<div class="row-fluid">
    <input type="text" id="<?php echo $v['id_movimento_faixa'] ?>" name="id_movimento_faixa[<?php echo $v['id_movimento_faixa'] ?>]" value="<?php echo $v['nome_movimento']; ?>">
    <a href="#" class="remover" onclick="remover_campo(<?php echo $v['id_movimento_faixa'] ?>)">remover</a>
</div>
<?php } ?>
    
    <a href="#" class="incluir_novo" onclick="incluir_novo()">Incluir novo</a>
    <input type="submit" value="Salvar">
</form>

<script>
    function incluir_novo(){
           alert('novo campo por ajax');
      }
     function remover_campo(id){
         
     }
     
</script>