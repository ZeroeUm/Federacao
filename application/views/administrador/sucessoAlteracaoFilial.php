<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row-fluid">
    <div class="alert-success">
        Alterações nas informações cadastrais da filial <?php echo $filial ?> realizadas com sucesso.<br />
        <b>
            <?php
            echo anchor('administrador/filiais', 'Clique aqui para voltar à área de manutenção de dados de filiais.');
            ?>
        </b>
    </div>
</div>