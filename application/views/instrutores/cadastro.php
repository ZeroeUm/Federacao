<script type="text/javascript" src="<?php echo base_url() . 'assets/js/manterAlunos.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/instrutor.css' ?>" />

<?php
$prop = array('class' => 'btn btn-small btn-primary','name' => 'incluirFederado', 'id' => 'incluirFederado');
echo anchor("instrutores/incluirFederado", "Incluir Federado", $prop);
echo br();
?>
</br>

<!-- div com nomes da label-->
<form action="" method="post">
    <div id="instru">
        <td>Instrutor</td>
    </div>

    <div id="fili">
        <td>Filial</td>
    </div>

    <div id="stat">
        <td>Status</td>
    </div>

    <div id="feder">
        <td>Federado</td>
    </div>
    <!--fom das div's-->


    <!--incio dos combobox-->

    <div id="cad">
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


           <!-- <td>Filial</td>-->
                <td>
                    <select name="filial" id="filial">
                        <option value="" >Selecione uma Filial</option>
                    </select>
                </td>

          <!--  <td>Status</td>-->
                <td>
                    <select name="status" id="status">
                        <option value="">Selecione o Status</option>
                    </select>
                </td>

          <!--  <td>Federado</td>-->
                <td>
                    <select class="span4" name="federado" id="federado">
                        <option value="">Selecione um Federado</option>
                    </select>
                </td>
            </tr>
        </table> <!--fim dos combobox-->          
    </div>    <!--fim da div cad -->
</form> <!--fim do form -->

<?php
echo form_fieldset("Resultado da pesquisa", array('id' => 'resultado','style' => 'display: none'));

$nome = array('id' => 'nomeFederado', 'name' => 'nomeFederado', 'maxlength' => '60', 'size' => '50', 'readonly' => 'readonly', 'class' => 'span3');
echo form_label("Federado","nomeFederado");
echo form_input($nome);

$data = array('id' => 'dataNasc', 'name' => 'dataNasc', 'maxlength' => '10', 'size' => '10', 'readonly' => 'readonly');
echo form_label("Data de nascimento","dataNasc");
echo form_input($data);

$idade = array('id' => 'idade', 'name' => 'idade', 'maxlength' => '3', 'size' => '3', 'readonly' => 'readonly', 'class' => 'input-mini');
echo form_label("Idade",'idade');
echo form_input($idade);

$telefone = array('id' => 'telefone', 'name' => 'telefone', 'maxlength' => '13', 'size' => '13', 'readonly' => 'readonly');
echo form_label("Telefone","telefone");
echo form_input($telefone);

$email = array('id' => 'email', 'name' => 'email', 'maxlength' => '50', 'size' => '50', 'readonly' => 'readonly', 'class' => 'span3');
echo form_label("E-mail","email");
echo form_input($email);

$celular = array('id' => 'celular', 'name' => 'celular', 'maxlength' => '14', 'size' => '14', 'readonly' => 'readonly');
echo form_label("Celular","celular");
echo form_input($celular);

$sexo = array('id' => 'sexo', 'name' => 'sexo', 'maxlength' => '1', 'size' => '2','readonly' => 'readonly', 'class' => 'input-mini');
echo form_label("Sexo","sexo");
echo form_input($sexo);

$escolaridade = array('id' => 'escolaridade', 'name' => 'escolaridade', 'maxlength' => '30', 'size' => '30', 'readonly' => 'readonly', 'class' => 'span3');
echo form_label("Escolaridade",'escolaridade');
echo form_input($escolaridade);

$nacionalidade = array('id' => 'nacionalidade', 'name' => 'nacionalidade', 'maxlength' => '30', 'size' => '30', 'readonly' => 'readonly', 'class' => 'span3');
echo form_label("Nacionalidade","nacionalidade");
echo form_input($nacionalidade);

$faixa = array('id' => 'faixa', 'name' => 'faixa', 'maxlength' => '30', 'size' => '30', 'readonly' => 'readonly', 'class' => 'span3');
echo form_label("Graduação atual","faixa");
echo form_input($faixa);
echo br();
echo anchor("", "Imprimir Federado", array('class' => 'btn btn-large btn-primary', 'id' => 'imprimir'));
echo nbs(4);
echo anchor("","Alterar informaÃ§Ãµes" , array('class' => 'btn btn-large btn-primary', 'id' => 'alterar'));

echo form_fieldset_close();
?>
