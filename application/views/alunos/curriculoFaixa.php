<?php
/*
 * 2013-04-30
 * @author Humberto
 */
$inf = $inf[0];
?>
<ul class="nav nav-pills">
    <?php
    foreach ($faixas as $f):
        if ($inf['id_graduacao'] == $f['id']):
            ?>
            <li class="active"><a href='<?php echo base_url(). 'alunos/curriculoFaixa/' . $f['id'] ?>'><?=$f['faixa'] ?></a></li>
            <?php
        else:
            ?>
            <li><a href='<?php echo base_url() . 'alunos/curriculoFaixa/' . $f['id'] ?>'><?= $f['faixa'] ?></a></li>
            <?php
        endif;

    endforeach;
    ?>
</ul>
<fieldset>
    <legend><?= nl2br($inf['faixa'])?> </legend>
</fieldset>
<div class="row-fluid">
    <p>
        <?= $inf['curriculo'] ?>
    </p>
</div>
    