Selecione um evento

<table class="table table-bordered">
    <tr>
        <td>Numero do Evento</td>
        <td>Data</td>
        <td>Solicitação</td>
    </tr>
    
    <?php foreach ($eventos as $v){ ?>
    <tr>
        <td><?php echo $v['numero_evento']; ?></td>
        <td><?php echo $v['data_evento']; ?></td>
        
        <td>
        <?php if($v['validar']!=true){?>
            <a href="<?php echo base_url()?>coordenador/totalizar_faixa/<?php echo $v['evento'];?>" class="btn btn-success">Solicitar faixas</a>
            <?php }else{ ?>
            <span class="label label-important">Pedido já realizado</span>
            <?php }?>
        </td>
        
    </tr>
     <?php }?>
</table>
