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
        Inclus�o das informa��es cadastrais de <b><?php echo $federado ?></b> realizadas com sucesso.<br />
        <b>
            <?php
            echo (isset($upload_foto) ? "Upload de foto realizada com sucesso." . br() : "");
            echo anchor('administrador/federados', 'Clique aqui para voltar � ��rea de manuten��o de dados de federados');
            ?>
        </b>
    </div>
</div>