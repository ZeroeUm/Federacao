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
                <?php foreach($historico as $h=>$v){extract($v)?>
                <tr>
                    <td align="center"><?php echo $nome;?></td>
                    <td align="center"><?php echo $data_aprovacao;?></td>
                    <td align="center"><?php echo $faixa;?></td>
                    <td align="center"><?php echo round($media,1);?></td>
                </tr>
                <?php } ?>
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