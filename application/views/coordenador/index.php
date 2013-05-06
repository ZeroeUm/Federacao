
<span class="pull-right ">Data para o próximo evento de graduação <span class="label label-success"><?php echo $this->funcoes->data($ultimo_evento['data_evento'],2);?></span></span>

<br>

Você tem <span class="label label-important"><?php echo $total['0']['total']; ?> alunos</span> aguardando agendamento para pré-avaliação - <a href="<?php echo base_url(); ?>coordenador/pre_avaliar">Verificar agora</a>
<hr>

<h3>Compromissos agendados</h3>

<table class="table table-bordered">
    <tr>
    <td>Data</td>
    <td>Filial</td>
    <td>Horário</td>
    <td></td>
    </tr>
    <?php foreach ($agenda as $i=>$v){?>
    <tr>
        <td><?php echo $v['data'];?></td>
        <td><?php echo $v['nome'];?></td>
        <td><?php echo $horario = ($v['horario']=='1') ? "Manhã": ($v['horario']=='2') ? "Tarde" : "Noite" ; ?></td>
        <td>
            
            <!--<a href="<?php echo base_url(); ?>coordenador/lancar_nota">Lançar notas</a>-->
        </td>
    </tr>
    <?php } ?>
</table>