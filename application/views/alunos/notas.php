<fieldset>
    <legend>
        <h4>Histórico de notas</h4>
    </legend>
    <?php
    if (!empty($historico)):
    ?>
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th><strong>Modalidade</strong></th>
                    <th><strong>Data</strong></th>
                    <th><strong>Categoria</strong></th>
                    <th><strong>Nota</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($historico as $h): ?>
                <tr>
                    <td align="center"><?= $historico['modalidade'] ?></td>
                    <td align="center"><?= $historico['data_aprovacao'] ?></td>
                    <td align="center"><?= $historico['faixa'] ?></td>
                    <td align="center"><?= $historico['media'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php
    else:
    ?>
    <h4>Não foram encontradas notas relacionadas ou lançadas no banco de dados.</h4>
    <?php
    endif;
    ?>
</fieldset>