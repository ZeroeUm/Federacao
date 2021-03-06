<?php if ($ultimo_evento['data_evento'] == '0000-00-00') { ?>
    <span class="pull-right ">Data para o próximo evento de graduação <span class="label label-success">Nenhum evento informado</span></span>
<?php } else { ?>
    <span class="pull-right ">Data para o próximo evento de graduação <span class="label label-success"><?php echo $this->funcoes->data($ultimo_evento['data_evento'], 2); ?></span></span>
<?php } ?>
<br>
<?php if ($total['0']['total'] != 0) { ?>
    Você tem <span class="label label-important"><?php echo $total['0']['total']; ?> alunos</span> aguardando agendamento para pré-avaliação - <a href="<?php echo base_url(); ?>coordenador/pre_avaliar">Verificar agora</a>
    <hr>
<?php } ?>

<h3>Avaliações agendadas</h3>

<?php if (empty($agenda)) { ?>
    <h4 style="color: red;text-align: center;margin-top: 50px;">Nenhuma avaliação agendada até o momento- 
        <?php if ($ultimo_evento['data_evento'] != '0000-00-00') { ?>
            Data do próximo evento <?php echo $this->funcoes->data($ultimo_evento['data_evento'], 2); ?>
        <?php } ?>
    </h4>
<?php } else { ?>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="span1">Quantidade de alunos</th>
                <th class="span2">Data</th>
                <th class="span2">Nome da Filial</th>
                <th class="span2">Horário da avaliação</th>
                

            </tr>
        </thead>
        <?php foreach ($agenda as $i => $v) { ?>
            <tr>
                <td><?php echo $v['total']; ?></td>
                <td><?php echo $v['data']; ?></td>
                <td><?php echo $v['nome']; ?></td>
                <td><?php echo $horario = ($v['horario'] == '1') ? "Manhã" : ($v['horario'] == '2') ? "Tarde" : "Noite" ; ?></td>
                
            </tr>
        <?php } ?>
    </table>

<?php } ?>