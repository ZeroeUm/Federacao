<div class="row-fluid">
    <a href="<?php echo base_url(); ?>instrutores/inscricao" class="btn btn-primary">Inscrever para evento</a>
</div>

<div class="row-fluid" style="margin-top: 50px;">
    <p>Resultado do Último evento da agenda: <span class="label"> <?php echo @$this->funcoes->data($ultimo_evento['data_evento'], 2); ?></span></p>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Alunos Aprovados</th>
                <th>Alunos Pendentes de avaliação</th>
                <th>Alunos Reprovados</th>
            </tr>
        </thead>

        <?php if (empty($resultado)) { ?>
            <tr>
                <td colspan="3" style="text-align: center;color: red;">Você não possui nenhum aluno cadastrado para o evento acima!</td>
            </tr>
        <?php } else { ?>
            <tr style="font-size: 14px;">
                <td>
                    <?php foreach ($resultado['aprovados'] as $i => $v) { ?>

                        <?php echo $v['nome']; ?>
                        <?php if ($v['avaliacao'] == '1') { ?>
                            <a href="<?php base_url() ?>instrutores/remover_evento_graduacao/<?php echo $v['id']; ?>/<?php echo $ultimo_evento['id_evento']; ?>" class="badge badge-important">Cancelar Participação</a>
                        <?php } else { ?>
                            <a href="<?php base_url() ?>instrutores/confirma_participacao/<?php echo $v['id']; ?>/<?php echo $ultimo_evento['id_evento']; ?>" class="badge badge-success">Confirma Participação</a>

                        <?php } ?>
                        <br>

                    <?php } ?>
                </td>           
                <td>
                    <table >

                        <?php foreach ($resultado['aguardando'] as $i => $v) { ?>
                            <tr style="font-size: 14px;">
                                <td style="border: none;"><?php echo $v['nome']; ?></td>
                                <td style="border: none;"><?php echo $v['data']; ?></td>
                                <td style="border: none;"><?php echo $v['horario']; ?>º Horário</td>
                                <td style="border: none;"><a href="<?php base_url() ?>instrutores/remover_pre_avaliacao/<?php echo $v['id']; ?>/<?php echo $ultimo_evento['id_evento']; ?>" class="badge badge-important">Remover</a></td>
                            </tr>    
                        <?php } ?>

                        <?php foreach ($resultado['nao_agendado'] as $i => $v) { ?>
                            <tr style="font-size: 14px;">
                                <td style="border: none;"><?php echo $v['nome']; ?></td>
                                <td style="border: none;">---------</td>
                                <td style="border: none;">---------</td>
                                <td style="border: none;"><a href="<?php base_url() ?>instrutores/remover_pre_avaliacao/<?php echo $v['id']; ?>/<?php echo $ultimo_evento['id_evento']; ?>" class="badge badge-important">Remover</a></td>

                            </tr>    
                        <?php } ?>


                    </table>
                </td>

                <td>
                    <?php foreach ($resultado['reprovados'] as $i => $v) { ?>

                        <?php echo $v['nome']; ?><br>

                    <?php } ?>  
                </td>
            </tr>
        <?php } ?>
    </table>
</div>