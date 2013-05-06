
<table class="table table-bordered">
<tr>
    <td>Faixa</td>
    
     <?php foreach ($faixas as $i=>$v){?>
    <td><?php echo $v['faixa'];?></td>
    <?php } ?>
</tr>

<tr>
    <td>Total</td>
    
     <?php foreach ($faixas as $i=>$v){?>
    <td><span class="label label-important"><?php echo $v['total'];?></span> <a href="<?php echo base_url(); ?>coordenador/imprimir_listagem/<?php echo $v['id_graduacao'] ?>" target="new" class="btn"> imprimir</a></td>
    <?php } ?>
</tr>
</table>

<hr>