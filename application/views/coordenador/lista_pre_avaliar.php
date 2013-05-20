<script>
$(document).ready(function(){
    $('#selecionar_filial').click(function(){
        $('#form').submit();
    }) 
});
</script>
<?php if(count($filiais)=='0'){ ?>
<div class="alert alert-error">
    No momento nenhuma pré-avaliação foi solicitada.
</div>
    <?php }else{ ?>

<h3>Pré-avaliação de alunos</h3>


<div class="row-fluid">
    
    <div class="span5">
    <form id="form" action="<?php echo base_url(); ?>coordenador/pre_avaliar" method="post">
        <label>
            Informe a filial
        </label>
        <select id="selecionar_filial" name="id_filial">
            
             <?php foreach ($filiais as $i=>$v){?>
            <option value="<?php echo $v['id_filial'] ?>"><?php echo $v['nome']; ?></option>
            <?php }?>
        </select>
    </form>
    </div>
    
    
    
</div>
<?php } ?>
<hr>

