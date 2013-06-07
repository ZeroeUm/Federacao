
<?php $ultimo_evento;?>


<h4>Lista dos participantes para o evento a ser realizado dia <span class="badge"><?php echo $this->funcoes->data($ultimo_evento['data_evento']);?></span></h4>

<?php if(empty($faixas)){?>

<h3 style="color: red;text-align: center;">0 - Alunos não avaliados</h3>

<?php }else{ ?>

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
<?php } ?>
<hr>