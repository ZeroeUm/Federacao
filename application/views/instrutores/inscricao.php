<script type="text/javascript" src="<?php echo base_url() . 'assets/js/increverFederado.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/instrutor.css' ?>" />


<?php header("setRequestHeader('Content-Type','application/xmlHttp.setRequestHeader('encoding','utf8_encode')", true) ?>

<div id="">
    <table>
        <tr>
            <!--<td>Instrutor</td>-->
            

           <td>
                    <select name="filial" id="filial">
                        <option value="" >Selecione uma Filial</option>
                        <?php
                        foreach ($filial as $row)
                            echo "<option value='" . $row->id . "'>" . $row->nome . "</option>";
                        ?>
                    </select>
                    </select>
                </td>
        </tr>
    </table>
</div>


<div id="mensagem" style="display: none; color: red">
</div>

<?php

echo form_fieldset("Resultado da pesquisa", array('id' => 'resultado', 'style' => 'display: none'));
echo form_open('instrutores/confirmar', array('id' => 'formulario'));
    

echo form_close();
echo form_fieldset_close();

?>

   


