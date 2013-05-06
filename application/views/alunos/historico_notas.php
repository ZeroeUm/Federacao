
<h5>Data de realização: <?php echo $historico['0']['data'];?></h5>

<h5>Faixa: <?php echo $historico['0']['faixa'];?></h5>
<div class="span6">
<table class="table table-bordered">
    <thead>
        <tr>
            <td>Movimento</td>
            <td>Nota</td>
        </tr>
    </thead>   
    <?php 
    $divisor = count($historico);
    $valor = 0;
    ?>
    <?php foreach ($historico as $v){ extract($v);?>
    <tr>
        <td><?php echo $nome_movimento;?></td>
        <td><?php echo $nota; $valor=$valor+$nota;?></td>
    </tr>
    
    <?php } ?>
    <tr>
        <td>Média</td>
        <td><?php echo $valor/$divisor; ?></td>
    </tr>
</table>
</div>