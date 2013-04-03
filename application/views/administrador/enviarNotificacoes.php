<?php
/* 2013-01-30
 * @author Humberto
 */
if (isset($erros)):
    ?>
    <div class="alert-warning">
        Houveram erros no envio de e-mails aos destinat�rios.<br/>
        Os seguintes destinat�rios n�o receberam a notifica��o:<br/>
        <?php
        echo ul($erros);
        ?>
        Verifique se os e-mails s�o v�lidos ou se o servidor de e-mail est� disponivel.
        <?php
        echo anchor(base_url(), 'Clique aqui para voltar � tela inicial.');
        ?>
    </div>
    <?php
else:
    ?>
    <div class="alert-success">
        Foram enviados com sucesso os e-mails para seus respectivos destinat�rios.
        <?php echo anchor(base_url(), 'Clique aqui para voltar � tela inicial.') ?>
    </div>
<?
endif;
?>

