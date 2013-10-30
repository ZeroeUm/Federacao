

<div class="accordion" id="accordion2">
  
    
    <h3>Aluno(a): <?php echo $notas['0']['federado']['nome']; ?></h3>
    
    
    <?php if(empty($notas['0']['nome_faixa'])){?>
    <h3 style="color: red;">Nenhuma nota lançada</h3>
    <?php }else{ ?>
    <?php foreach ($notas as $i){?>
    <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#acorde<?php echo $i['id_graduacao'] ?>">
        <?php echo $i['nome_faixa'] ?> 
      </a>
    </div>
    <div id="acorde<?php echo $i['id_graduacao'] ?>" class="accordion-body collapse">
      <div class="accordion-inner">
          Data do lançamento da nota: <span class="label"> <?php echo @$this->funcoes->tratar_timestamp($i['notas']['0']['data'],0); ?></span><br>
          <table style="margin-top: 20px;">
              
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
    <?php } } ?>
    
  
</div>