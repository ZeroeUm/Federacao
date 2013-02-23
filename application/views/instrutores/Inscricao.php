<script type="text/javascript" src="<?php echo base_url() . 'assets/js/increverFederado.js' ?>"></script>

<div id="">
    <table>
        <tr>
            <!--<td>Instrutor</td>-->
            <td>
                <select name="instrutor" id="instrutor">
                    <option value="">Selecione o Instrutor</option>
                    <?php
                    foreach ($instrutor as $row)
                        echo "<option value='" . $row->id . "'>" . $row->nome . "</option>";
                    ?>
                </select>
            </td>

            <td>
                <select name="filial" id="filial">
                    <option value="" >Selecione uma Filial</option>
                </select>
            </td>
        </tr>
    </table>
</div>

    <?php
echo form_fieldset("Resultado da pesquisa", array('id' => 'resultado','style' => 'display: none'));

$nome = array('id' => 'nomeFederado', 'name' => 'nomeFederado', 'maxlength' => '60', 'size' => '50', 'readonly' => 'readonly', 'class' => 'span3');
echo form_label("Federado","nomeFederado");
echo form_input($nome);
echo form_fieldset_close();
?>
   


