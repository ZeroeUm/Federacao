<?php

/* 2013-02-06
 * @author Humberto
 */
if ($troca):
?>
<div class="alert-info">
    Mensagem de mala-direta aos aniversariantes alterada e salva com sucesso.
    <br/>
    <?php echo anchor(base_url(),'Clique aqui para voltar a página principal.')?>
</div>
<?php
else:
?>
<div class="alert-success">
    Mensagem de mala-direta aos aniversariantes incluída e salva com sucesso.
    <br />
    <?php echo anchor(base_url(),"Clique aqui para voltar a página principal.") ?>
</div>
<?php
endif;
?>
