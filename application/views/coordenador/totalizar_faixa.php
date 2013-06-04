<form action="<?php echo base_url();?>coordenador/salvar_pedido" method="post">

<div class="row-fluid">
    <div class="span3">
        Numero do Evento: 
    </div>
    <div class="span3">
        <?php echo $evento['0']['numero_evento'];?>
        <input type="hidden" value="<?php echo $evento['0']['id_evento'];?>" name="id_evento">
    </div>
</div>


<div class="row-fluid">
    <div class="span3">
        Data: 
    </div>

    <div class="span3">
<?php echo $evento['0']['data_evento'];?>
    </div>
</div>

<div class="row-fluid">
    <div class="span3">
        Local: 
    </div>

    <div class="span3">
<?php echo $evento['0']['logradouro'];?>
    </div>
</div>

<hr>

<u>Totais de faixas de acordo com alunos aprovados:</u>



<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <td>Faixa</td>
            <td>Tamanho</td>
            <td>Total de pedido</td>
        </tr>
    </thead>
    <?php $cont = 0; ?>
    <?php foreach ($totais as $v) { ?>
        <tr>
            <td><?php echo $v['nome_faixa']; ?></td>
            <td><?php echo $v['tamanho_faixa']; ?></td>
            <td>
                <input type="text" name="faixa[<?php echo $v['id_graduacao'].'X'.$v['tamanho_faixa']; ?>]" value="<?php echo $v['total']; $cont = $cont+$v['total']; ?>">
                
            </td>
        </tr>
    <?php } ?>
</table>
<div class="row-fluid">
    <div class="span3">
        Total de faixas para o evento: <?php echo $cont;?>
    </div>
</div>


<input type="submit" value="Confirmar Pedido" class="btn btn-success">
</form>