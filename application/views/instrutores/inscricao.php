<script type="text/javascript" src="<?php echo base_url() . 'assets/js/increverFederado.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/instrutor.css' ?>" />
<?php 

$data_limite = $this->funcoes->subtrair_data($evento['data_evento'],'8');
?>
    
<?php if($evento['data_evento']=='0000-00-00'){;?>

<h2 style="color: red;">Nenhum evento cadastrado</h2>

<?php }elseif ($data_limite>$evento['data_evento']){  ?>

    <h2 style="color: red;">Não é permitido mais realizar inscrições</h2>

<?php }else{ ?>
    
<div id="">
    <p style="float: right;">Data limite para inscrição: <span class="label label-important"><?php echo $this->funcoes->data($data_limite);?></span></p>
    <table>
        <tr>
            <!--<td>Instrutor</td>-->
            

           <td>
               
               </p>
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
}
?>

   


