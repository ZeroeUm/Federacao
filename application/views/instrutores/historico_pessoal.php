

<div class="accordion" id="accordion2">
  
    
    <h3>Aluno(a): <?php echo $notas['0']['federado']['nome']; ?></h3>
    
    
    
    <?php foreach ($notas as $i){?>
    <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#acorde<?php echo $i['id_graduacao'] ?>">
        <?php echo $i['nome_faixa'] ?> - Data <?php echo $i['notas']['0']['data']; ?>
      </a>
    </div>
    <div id="acorde<?php echo $i['id_graduacao'] ?>" class="accordion-body collapse">
      <div class="accordion-inner">
       
          <table>
          <?php foreach ($i['notas'] as $r){?>
              <tr>
                  <td style="padding-right:20px; "><?php echo $r['nome_movimento']; ?> </td> 
                  <td style="padding-right:20px; "> <?php echo $r['nota']; ?></td>
                  
            </tr>
          <?php } ?>
          </table>
      </div>
    </div>
  </div>
    <?php } ?>
    
  
</div>