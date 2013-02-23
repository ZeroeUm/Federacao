<?php
    if(isset ($error)){
        echo $error;
        echo br();
    }
?>
<div class="alert-success">
    Altera��es nas informações cadastrais de <b><?php echo $federado?></b> realizadas com sucesso.<br />
    <b>
    <?php 
        echo (isset($upload_foto)?"Nova foto colocada no sistema.".br():"");
        echo anchor('instrutores/cadastro','Clique aqui para voltar � Área de manuten��o de dados cadastrais');
    ?>
    </b>
</div>


