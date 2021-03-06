<div class="row-fluid">
    <a href="<?php echo base_url(); ?>instrutores/inscricao" class="btn btn-success">Inscrever para evento</a>
</div>


<?php if($ultimo_evento['data_evento']=='0000-00-00'){?>

<h3 style="color: red;">Nenhum evento cadastrado</h3>

<?php }elseif ($ultimo_evento['data_evento']< date('Y-m-d')) { ?>
     
<h4 style="color: red;">Nenhum evento cadastrado por seu coordenador o ultimo evento ocorreu dia <?php echo @$this->funcoes->data($ultimo_evento['data_evento'], 2); ?></h4>

<?php }else{ ?>
<div class="row-fluid" style="margin-top: 50px;">
    <p>Novo evento de graduação: <span class="label label-important"> <?php echo @$this->funcoes->data($ultimo_evento['data_evento'], 2); ?></span></p>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Alunos Aprovados</th>
                <th>Alunos Pendentes de avaliação</th>
                <th>Alunos Reprovados</th>
            </tr>
        </thead>

        <?php if ($resultado['exibir']=='0') { ?>
            <tr>
                <td colspan="3" style="text-align: center;color: red;">Você não possui ainda nenhum aluno cadastrado para o evento acima!</td>
            </tr>
        <?php } else { ?>
            <tr style="font-size: 14px;" >
                <td class="span7">
                    <?php foreach ($resultado['aprovados'] as $i => $v) { ?>

                    <div class="span3" style="padding: 0px;line-height: 0px;"><?php echo $v['nome']; ?></div>
                        <?php if ($v['avaliacao'] == '1') { ?>
                    <div class="span1" style="padding: 0px;">        <a href="<?php echo base_url() ?>instrutores/remover_evento_graduacao/<?php echo $v['id']; ?>/<?php echo $ultimo_evento['id_evento']; ?>" class="badge badge-important">Cancelar Participação</a></div>
                        <?php } else { ?>
                    <div class="span1" style="padding: 0px;">        <a href="<?php echo base_url() ?>instrutores/confirma_participacao/<?php echo $v['id']; ?>/<?php echo $ultimo_evento['id_evento']; ?>" class="badge badge-success">Confirma Participação</a></div>

                        <?php } ?>
                        <br>

                    <?php } ?>
                </td>           
                <td class="span7">
                    <table >

                        <?php foreach ($resultado['aguardando'] as $i => $v) { ?>
                            <tr style="font-size: 14px;">
                                <td style="border: none;" class="span5"><?php echo $v['nome']; ?></td>
                                <td style="border: none;"  class="span3">Agendamento <br><?php echo $v['data']; ?></td>
                                <td style="border: none;"  class="span1"><?php echo $v['horario']; ?>º Horário</td>
                                <td style="border: none;"  class="span1"><a href="<?php echo base_url() ?>instrutores/remover_pre_avaliacao/<?php echo $v['id']; ?>/<?php echo $ultimo_evento['id_evento']; ?>" class="badge badge-important">Remover</a></td>
                            </tr>    
                        <?php } ?>

                        <?php foreach ($resultado['nao_agendado'] as $i => $v) { ?>
                            <tr style="font-size: 14px;">
                                <td style="border: none;"><?php echo $v['nome']; ?></td>
                                <td style="border: none;"></td>
                                <td style="border: none;"></td>
                                <td style="border: none;"><a href="<?php echo base_url() ?>instrutores/remover_pre_avaliacao/<?php echo $v['id']; ?>/<?php echo $ultimo_evento['id_evento']; ?>" class="badge badge-important">Remover</a></td>

                            </tr>    
                        <?php } ?>


                    </table>
                </td>

                <td class="span7">
                    <?php foreach ($resultado['reprovados'] as $i => $v) { ?>

                        <?php echo $v['nome']; ?><br>

                    <?php } ?>  
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<?php } ?>