<?php
/*
 * 2013-01-29
 * @author Humberto
 */
?>
<div class="row-fluid">
    <div class="alert-success">
        Inclusão da filial <?php echo $filial ?> na Federação Paulista de Artes Marciais Interestilos realizada com sucesso.<br/>
        <b>
            <?php
            echo anchor('administrador/filiais', 'Clique aqui para voltar à área de manutenção de dados de filiais.');
            ?>
        </b>
    </div>
</div>