
<div class="row-fluid">
    Total de alunos do instrutor: <span class="badge"><?php echo $total_alunos['0']['total_alunos'];?></span>
</div>

<div class="row-fluid" style="margin-top: 50px;">
    <p>Resultado do Último evento da agenda: <span class="label label-important"> <?php echo $ultimo_evento;?></span></p>
    <table class="table table-bordered table-hover">
    <tr>
        <td>Alunos Aprovados</td>
        <td>Alunos Pendentes de avaliação</td>
        <td>Alunos Reprovados</td>
    </tr>
    <?php if(!empty($resultado)){ ?>
    <tr>
        <td>
            <?php foreach ($resultado['aprovados']['nome'] as $i=>$v){?>
            <p><?php echo $v;?> -  Faixa <?php echo $resultado['aprovados']['faixa'][$i];?></p>
            <?php } ?>
        </td>
        <td>
            <?php foreach ($resultado['aguardando']['nome'] as $i=>$v){?>
            <p><?php echo $v;?> - <span class="label label-success">data da avaliação <?php echo $resultado['aguardando']['data_avaliacao'][$i]; ?> - <?php echo $resultado['aguardando']['horario'][$i]; ?>º horário</span></p>
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
    <?php }else{ ?>
    <tr>
        <td colspan="3" style="text-align: center;color: red;">Você não possui nenhum aluno cadastrado para o evento acima!</td>
    </tr>
    <?php }?>
</table>
</div>