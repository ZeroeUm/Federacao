<?php
if (isset($error))
{
    ?>
    <div class="row-fluid">    
        <?php
        echo $error;
        echo br();
        ?>
    </div>    
    <?php
}
?>

<div class="row-fluid">
    <div class="alert-success">
        Alterações nas informações cadastrais de <b><?php echo $federado ?></b> realizadas com sucesso.<br />
        <b>
            <?php
            echo (isset($upload_foto) ? "Nova foto colocada no sistema." . br() : "");
            echo anchor('administrador/federados', 'Clique aqui para voltar à área de manutenção de dados cadastrais');
            ?>
        </b>
    </div>
</div>