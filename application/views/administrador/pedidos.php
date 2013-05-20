


<div class="row-fluid">
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Numero do evento</th>
                <th>Data</th>
                <th>Quantidade de faixas</th>
                <th>Detalhes do pedido</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $i=>$v){ extract($v); ?>
            <tr>
                <td><?php echo $numero_evento; ?></td>
                <td><?php echo $this->funcoes->data($data); ?></td>
                <td><?php echo $total; ?></td>
                <td><a href="<?php echo base_url();?>administrador/detalhe_pedido/<?php echo $id; ?>" class="btn btn-small">Detalhes</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
