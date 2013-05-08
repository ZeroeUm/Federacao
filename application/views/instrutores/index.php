<div class="row-fluid">
Data do próximo evento de graduação:
</div>
<div class="row-fluid">
Total de alunos:
</div>

<div class="row-fluid" style="margin-top: 50px;">
<table class="table table-bordered table-hover">
    <tr>
        <td>Alunos Aprovados</td>
        <td>Alunos Re-avaliar</td>
        <td>Alunos Reprovados</td>
    </tr>
    
    <tr>
        <td>
            <?php foreach ($resultado['aprovados']['nome'] as $i=>$v){?>
            <p><?php echo $v;?> -  Faixa <?php echo $resultado['aprovados']['faixa'][$i];?></p>
            <?php } ?>
        </td>
        <td>
            <?php foreach ($resultado['aguardando']['nome'] as $i=>$v){?>
            <p><?php echo $v;?> - <span class="label label-success">data da Re-avaliação <?php echo $resultado['aguardando']['data_avaliacao'][$i]; ?> - <?php echo $resultado['aguardando']['horario'][$i]; ?>º horário</span></p>
            <?php } ?>
            
            <?php foreach ($resultado['nao_agendado']['nome'] as $i=>$v){?>
            <p><?php echo $v;?> - <span class="label label-important">Não Agendado</span> </p>
            <?php } ?>
            
        </td>
        <td>
             <?php foreach ($resultado['reprovados']['nome'] as $v){?>
            <p style="color: red;"><?php echo $v;?></p>
            <?php } ?>
        </td>
    </tr>
</table>
</div>