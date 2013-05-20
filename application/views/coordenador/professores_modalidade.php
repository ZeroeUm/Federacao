


<div class="row-fluid">


    <?php
    if (!$professor) {
        echo "nada encontrado";
    } else {
        ?>
   
    <?php foreach ($professor as $r => $t) { ?>
     <h3>Dados</h3>
    <div class="row-fluid">
    <div class="span2">Nome:</div>
    <div class="span4"><?php echo $t['nome']; ?></div>
    </div>
   
    
    
     <div class="row-fluid">
    <div class="span2">Sexo:</div>
    <div class="span4"><?php echo $t['sexo']; ?></div>
     </div>
    
     <div class="row-fluid">
    <div class="span2">Telefone:</div>
    <div class="span4"><?php echo $t['telefone']; ?></div>
     </div>
    
     
     <div class="row-fluid">
    <div class="span2">E-mail:</div>
    <div class="span4"><?php echo $t['email']; ?></div>
     </div>
    
    
     <div class="row-fluid">
    <div class="span2">Data Nascimento:</div>
    <div class="span4"><?php echo $t['data_nasc']; ?></div>
     </div>
     
      <div class="row-fluid">
    <div class="span2">Filial onde ministra aulas:</div>
    <div class="span4"><?php echo $t['nome_filial']; ?></div>
     </div>
    
    <hr>
    <?php }
            } ?>

</div>
