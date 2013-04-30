<?php
/*
 * 2013-04-27
 * @author Humberto
 */
?>
<ul class="nav nav-pills">
    <?php
    foreach ($faixas as $f):
        if ($f['id'] == $this->session->userdata('faixa')):
            ?>
            <li class="active">
                <a href='#'>
                    <?= 'Faixa '.$f['faixa'] ?>
                </a>
            </li>
            <?php
        else:
            ?>
            <li>
                <a href='#'>
                    <?= 'Faixa '.$f['faixa'] ?>
                </a>
            </li>
        <?php
        endif;
    endforeach;
    ?>
</ul>
