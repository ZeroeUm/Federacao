<script>
    $(document).ready(function(){
        $('.<?php echo $faixa; ?>_faixa').addClass('active');
    });

</script>

Relação de participantes

    
    
<div class="row-fluid">
    
</div>

<div class="pagination">
  <ul>
    <?php foreach ($faixas as $i){ ?>
      <li class="<?php echo $i['id_faixa']."_faixa"; ?>"><a href="/coordenador/participantes/<?php echo $id_evento; ?>/<?php echo $i['id_faixa'];?>"><?php echo $i['nome'];?></a></li>
    <?php }?>
  </ul>
</div>
<table class="table-bordered table">
    <thead>
        <tr>
            <td>Nome</td>
            <td>Email</td>
            <td>Telefone</td>
        </tr>
    </thead>

    <tbody>
       
        <?php 
        $total = 0;
        foreach ($participantes as $i){?>
        <tr>
            <td><?php echo $i['nome'];?></td>
            <td><?php echo $i['email'];?></td>
            <td><?php echo $i['telefone'];?></td>
            
        </tr>
        <?php 
        $total = $total+1;
        
        } ?>
        
    </tbody>
</table>

<div class="row-fluid">
    <h3>Total de inscrições: <?php echo $total; ?></h3>
</div>