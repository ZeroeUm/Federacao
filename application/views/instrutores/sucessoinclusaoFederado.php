<?php
    if(isset ($error)){
        echo $error;
        echo br();
    }
?>
<div class="alert-success">
    Inclusão de <b><?php echo $federado?></b> realizada com sucesso.<br />
    <b>
    <?php 
        echo (isset($upload_foto)?"Nova foto colocada no sistema.".br():"");
        echo anchor('instrutores/cadastro','Clique aqui para voltar á area de manutenção de dados cadastrais');
    ?>
    </b>
</div>


