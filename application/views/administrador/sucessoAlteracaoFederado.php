
<div class="row-fluid">
    <div class="alert-success">
        Altera��es nas informa��es cadastrais de <b><?php echo $federado ?></b> realizadas com sucesso.<br />
        <b>
            <?php
            echo (isset($upload_foto) ? "Nova foto colocada no sistema." . br() : "");
            echo anchor('administrador/federados', 'Clique aqui para voltar � ��rea de manuten��o de dados cadastrais');
            ?>
        </b>
    </div>
</div>