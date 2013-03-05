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
        Alterações nas informações cadastrais de <b><?php echo $federado ?></b> realizadas com sucesso.<br />
        <b>
            <?php
            echo (isset($upload_foto) ? "Nova foto colocada no sistema." . br() : "");
            echo anchor('administrador/federados', 'Clique aqui para voltar à Área de manutenção de dados cadastrais');
            ?>
        </b>
    </div>
</div>