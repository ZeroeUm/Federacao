Detalhes dos pedido para esse evento

<hr>

<table class="table table-bordered">
    <thead>
    <th>Faixa</th>
    <th>Tamanho</th>
    <th>Quantidade</th>
</thead>
<tbody>
    <?php foreach ($detalhes as $i=>$v){ extract($v)?>
    <tr>
        <td><?php echo $faixa;?></td>
        <td><?php echo $tamanho;?></td>
        <td><?php echo $quantidade;?></td>
    </tr>
    
    <?php } ?>
</tbody>

</table>