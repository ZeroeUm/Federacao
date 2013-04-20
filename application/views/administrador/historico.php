<script src="<?php echo base_url(); ?>assets/js/historico.js" type="text/javascript"></script>
<?php
/* 2013-02-02
 * @author HUmberto
 */
echo form_fieldset("Pesquisa por federado");
$options = array('#' => "Escolha uma opção.");
foreach ($instrutores as $instrutor)
    $options[$instrutor['id']] = $instrutor['nome'];
?>
<div id="row-fluid">
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th><?php echo form_label("Instrutores", "instrutores"); ?></th>
                <th><?php echo form_label("Filiais", "filiais"); ?></th>
                <th><?php echo form_label("Situação", "situacao"); ?></th>
                <th><?php echo form_label("Federados", "federados"); ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="vertical-align: middle; text-align: center;">
                    <?php echo form_dropdown('instrutores', $options, '#', 'id="instrutores" class="span3"'); ?>
                </td>
                <td style="vertical-align: middle; text-align: center;">
                    <?php echo form_dropdown("filiais", array("#" => "Escolha um instrutor"), "#", 'id="filiais" class="span3"'); ?>
                </td>
                <td style="vertical-align: middle; text-align: center;">
                    <?php echo form_dropdown("situacao", array("#" => "Escolha uma filial"), "#", 'disabled id="situacao" class="span3"'); ?>
                </td>
                <td style="vertical-align: middle; text-align: center;">
                    <?php echo form_dropdown("federados", array("#" => "Escolha uma situação"), "#", 'id="federados" class="span3"'); ?>
                </td>
            </tr>
        </tbody>
        <?php
        echo form_fieldset_close();
        ?>
    </table>
</div>
<div id="row-fluid">
    <?
    echo form_fieldset("Resultado da pesquisa", array('id' => 'resultado', 'style' => 'display: none'));

    echo form_fieldset_close();
    ?>
</div>


