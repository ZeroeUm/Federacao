<?php
/*
 * 2013-02-26
 * @author Humberto
 */
?>
<div class="alert-error">
    <strong>
    <?php
        if($excluidos == 0):
    ?>
    N�o foram exclu�dos nenhum dos itens do pedido <?= $pedido?>.
    <?php
        else:
    ?>
    Foram exclu�dos <?= $excluidos?> item(s) do pedido <?= $pedido?>.
    <?php    
        endif;
    ?>
    </strong>
</div>
<div class="alert-info">
    <strong>
    <?php
        if($incluidos == 0):
    ?>
    N�o foram inclu�dos nenhum dos itens do pedido <?= $pedido?>.
    <?php
        else:
    ?>
    Foram inclu�dos <?=$incluidos?> item(s) do pedido <?= $pedido?>.
    <?php
        endif;
    ?>
    </strong>
</div>
<div class="alert-success">
    <strong>
    <?php
        if($atualizados == 0):
    ?>
    N�o foram atualizados nenhum dos itens do pedido <?= $pedido?>.
    <?php
        else:
    ?>
    Foram atualizados <?=$atualizados?> item(s) do pedido <?= $pedido?>.
    <?php
        endif;
    ?>
    </strong>
</div>
<?php
    echo anchor('administrador/pedidos', 'Clique aqui para retornar a lista de pedidos.');
?>
