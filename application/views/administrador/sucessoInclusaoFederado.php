<div class="row-fluid">
    <?php
    if (isset($error))
    {
        echo $error;
        echo br();
    }
    ?>
</div>
<div class="row-fluid">
    <div class="alert-success">
        Inclusão das informações cadastrais de <b><?php echo $federado ?></b> realizadas com sucesso.<br />
        <b>
            <?php
            echo (isset($upload_foto) ? "Upload de foto realizada com sucesso." . br() : "");
            echo anchor('administrador/federados', 'Clique aqui para voltar à Área de manutenção de dados de federados');
            ?>
        </b>
    </div>
</div>