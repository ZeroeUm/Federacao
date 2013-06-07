

<table class="table table-bordered">
    <thead>
            <th>Aluno</th>
            <th>Faixa atual</th>
            <th>Histórico</th>
    </thead>

    <tbody>
        <?php foreach ($alunos as $i=>$v){ extract($v)?>
        <tr>
            <td><?php echo $nome; ?></td>
            <td><?php echo $faixa; ?></td>
            <td><a href="<?php echo base_url();?>instrutores/historico_pessoal/<?php echo $id; ?>" class="btn btn-success btn-small">Ver histórico</a></td>
        </tr>
        <?php } ?>
    </tbody>

</table>