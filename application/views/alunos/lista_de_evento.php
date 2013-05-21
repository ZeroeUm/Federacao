<fieldset>
    <legend>Lista de Eventos</legend>
    <table class="table table-bordered">
        <tr>
            <td>Data do Evento</td>
            <td>Local</td>
            <td>Histórico de notas</td>
        </tr>
        <?php
        foreach ($eventos as $v):
            extract($v);
            ?>
            <tr>
                <td><?php echo $data ?></td>
                <td><?php echo utf8_encode($endereco_evento); ?></td>
                <td><?php if ($status == '0'): ?>
                        <span class="label label-important">Não possui notas</span>
                        <?php
                    else:
                        ?>         
                        <a href="<?php echo base_url(); ?>alunos/historico_de_notas/<?php echo $id_evento; ?>" class="label label-success">Ver minhas notas</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</fieldset>