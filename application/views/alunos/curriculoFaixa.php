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
    <legend><?= $inf['faixa']?> </legend>
</fieldset>
<div class="row-fluid">
    <p>
        <?= nl2br($inf['curriculo']) ?>
        
        <iframe width="100%" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.mestrecarlos.com.br"></iframe>

    </p>
</div>
    