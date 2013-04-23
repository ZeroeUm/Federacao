
<script>
$(document).ready(function(){
    $('#selecionar_filial').click(function(){
       
       alert('fa');
    }) 
    
    
    
});
</script>


<h3>Compromissos agendados</h3>


<div class="row-fluid">
    
    <div class="span5">
    <form id="form" action="#" method="get">
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