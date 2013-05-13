
<div class="row-fluid">
    Total de alunos do instrutor: <span class="badge"><?php echo $total_alunos['0']['total_alunos']; ?></span>
</div>

<div class="row-fluid" style="margin-top: 50px;">
    <p>Resultado do Último evento da agenda: <span class="label label-important"> <?php echo @$this->funcoes->data($ultimo_evento['data_evento'],2); ?></span></p>
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>Alunos Aprovados</th>
            <th>Alunos Pendentes de avaliação</th>
            <th>Alunos Reprovados</th>
        </tr>
        </thead>
        
        <?php if (!empty($resultado)) { ?>
            <tr>
                <td>
                    <table>
                        <?php foreach ($resultado['aprovados']['nome'] as $i => $v) { ?>
                            <tr>
                                <td>
                                    <?php echo $v; ?> -  Faixa <?php echo $resultado['aprovados']['faixa'][$i]; ?> 
                                    <?php if($resultado['aprovados']['status'][$i]=='1'){?>
                                    <a href="/instrutores/remover_evento_graduacao/<?php echo $resultado['aprovados']['id'][$i]; ?>/<?php echo $ultimo_evento['id_evento'];?>" class="label label-important">Cancelar Participação</a>
                                    <?php }else{?>
                                    <a href="/instrutores/confirma_participacao/<?php echo $resultado['aprovados']['id'][$i]; ?>/<?php echo $ultimo_evento['id_evento'];?>" class="label label-success">Inscrever no evento</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </td>
                <td>
                    <table>
                        <?php foreach ($resultado['aguardando']['nome'] as $i => $v) { ?>
                            <tr>
                                <td>
                                    <?php echo $v; ?> - <span class="label label-success"><?php echo $resultado['aguardando']['data_avaliacao'][$i]; ?> - <?php echo $resultado['aguardando']['horario'][$i]; ?>º horário</span>
                                    <a href="/instrutores/remover_pre_avaliacao/<?php echo $resultado['aguardando']['id'][$i]; ?>/<?php echo $ultimo_evento['id_evento'];?>" class="btn btn-small">Cancelar</a>
                                </td>
                            </tr>
                        <?php } ?>

                        <?php foreach ($resultado['nao_agendado']['nome'] as $i => $v) { ?>
                            <tr>
                                <td>
                                    <?php echo $v; ?>
                                    <a href="/instrutores/remover_pre_avaliacao/<?php echo $resultado['nao_agendado']['id'][$i]; ?>/<?php echo $ultimo_evento['id_evento'];?>" class="label label-important">Cancelar Avaliação</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </td>
                <td>
                    <table>

                        <?php foreach ($resultado['reprovados']['nome'] as $v) { ?>
                            <tr>
                                <td>
                                    <span style="color: red;"><?php echo $v; ?></span>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        <?php } else { ?>
            <tr>
                <td colspan="3" style="text-align: center;color: red;">Você não possui nenhum aluno cadastrado para o evento acima!</td>
            </tr>
        <?php } ?>
    </table>
</div>