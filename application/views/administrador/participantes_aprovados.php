<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<style>
   
</style>
<div class="borda" style="max-width:1200px;min-width: 800px;border: 1px solid">
    <div class="logo" style="padding: 10px;"><img src="/federados/logo2.png"></div>  

    
    <table class="table table-condensed">
        <tr class="linha" >
            <td  style="padding-bottom: 30px;border-bottom: 1px solid black;">Nome do aluno</td>
            <td style="border-bottom: 1px solid black;"></td>
            <td style="border-bottom: 1px solid black;">Média</td>
        </tr>
        
        <tr>
            <td colspan="3" style="text-align: center; padding: 20px"><h4><?php echo @$participantes['0']['faixa']; ?></h4></td>
            
        </tr>
        <?php if(empty($participantes)){?>
        <tr>
            <td colspan="3" style="text-align: center;">Nenhum aluno foi aprovado para o evento.</td>
        </tr>
        <?php }else{?>
        <?php foreach ($participantes as $i=>$v){ ?>
        <?php if($i=='0'){ $g=$i;}else{$g=$i-1;}; ?>
        
        <?php  if($v['faixa']!= $participantes[$g]['faixa']){     ?>
        <tr>
            <td colspan="3" style="text-align: center;padding: 20px"><h4><?php echo $v['faixa']; ?></h4></td>
            
        </tr>
        <?php }?>
        
        <tr>
            <td><?php echo $v['nome']; ?></td>
            <td></td>
            <td><?php echo round($v['media']['0']['media'],1); ?></td>
        </tr>
        
            
        
        <?php } ?>
        <?php } ?>
    </table>


</div>