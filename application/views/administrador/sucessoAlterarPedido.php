<?php
/*
 * 2013-02-26
 * @author Humberto
 */
?>
<div class="row-fluid">
    <div class="alert-error">
        <strong>
            <?php
            if ($excluidos == 0):
                ?>
                Não foram excluídos nenhum dos itens do pedido <?= $pedido ?>.
                <?php
            else:
                ?>
                Foram excluídos <?= $excluidos ?> item(s) do pedido <?= $pedido ?>.
            <?php
            endif;
            ?>
        </strong>
    </div>
</div>
<div class="row-fluid">
    <div class="alert-info">
        <strong>
            <?php
            if ($incluidos == 0):
                ?>
                Não foram incluídos nenhum dos itens do pedido <?= $pedido ?>.
                <?php
            else:
                ?>
                Foram incluídos <?= $incluidos ?> item(s) do pedido <?= $pedido ?>.
            <?php
            endif;
            ?>
        </strong>
    </div>
</div>
<div class="row-fluid">
    <div class="alert-success">
        <strong>
            <?php
            if ($atualizados == 0):
                ?>
                Não foram atualizados nenhum dos itens do pedido <?= $pedido ?>.
                <?php
            else:
                ?>
                Foram atualizados <?= $atualizados ?> item(s) do pedido <?= $pedido ?>.
            <?php
            endif;
            ?>
        </strong>
    </div>
</div>
<div class="row-fluid">
    <?php
    echo anchor('administrador/pedidos', 'Clique aqui para retornar a lista de pedidos.');
    ?>
</div>