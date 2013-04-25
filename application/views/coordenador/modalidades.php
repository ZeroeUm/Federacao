<h3>Modalidades</h3>
<div class="span12">
    <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-align-justify"></i>									
            </span>
            <h5>Localizar professor</h5>
        </div>
        <div class="widget-content nopadding">
            <?php
            echo form_open('coordenador/professores');
            echo form_label('Selecione a modalidade:', 'nome');
            ?>

            <select name="filial">
                <?php
                foreach ($dados as $d) {
                    ?>
                <option value="<?php echo $d['idFilial'];?>"><?php echo $d['modalidade'];?></option> 
                        
               <?php }
                ?>
            </select>



            <?php
            echo form_submit('add', 'localizar');
            echo form_close();
            ?>

        </div>
    </div>						
</div>

<table>
   
    <tr>
        <td>nomes: <?php echo $filial;?></td>
    </tr>
   
</table>