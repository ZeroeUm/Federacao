<?php
/* 2013-01-30
 * @author Humberto
 */
if (isset($erros)):
    ?>
    <div class="alert-warning">
        Houveram erros no envio de e-mails aos destinatários.<br/>
        Os seguintes destinatários não receberam a notificação:<br/>
        <?php
        echo ul($erros);
        ?>
        Verifique se os e-mails são válidos ou se o servidor de e-mail está disponivel.
        <?php
        echo anchor(base_url(), 'Clique aqui para voltar à tela inicial.');
        ?>
    </div>
    <?php
else:
    ?>
    <div class="alert-success">
        Foram enviados com sucesso os e-mails para seus respectivos destinatários.
        <?php echo anchor(base_url(), 'Clique aqui para voltar à tela inicial.') ?>
    </div>
<?
endif;
?>

