<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/manterFederados.js"></script>
<?php
$prop = array('class' => 'btn btn-primary', 'name' => 'incluirFederado', 'id' => 'incluirFederado');

echo anchor("administrador/incluirFederado", "Incluir Federado", $prop);

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
                <td style="vertical-align: middle; text-align: center;"><?php echo form_dropdown('instrutores', $options, '#', 'id="instrutores" class="span3"'); ?></td>
                <td style="vertical-align: middle; text-align: center;"><?php echo form_dropdown("filiais", array("#" => "Escolha um instrutor"), "#", 'id="filiais" class="span3"'); ?></td>
                <td style="vertical-align: middle; text-align: center;"><?php echo form_dropdown("situacao", array("#" => "Escolha uma filial"), "#", 'disabled id="situacao" class="span3"'); ?></td>
                <td style="vertical-align: middle; text-align: center;"><?php echo form_dropdown("federados", array("#" => "Escolha uma situação"), "#", 'id="federados" class="span3"'); ?></td>
            </tr>
        </tbody>
        <?php
        echo form_fieldset_close();
        ?>
    </table>
</div>
<div id="row-fluid">
    <?php
    echo form_fieldset("Resultado da pesquisa", array('id' => 'resultado', 'style' => 'display: none'));

    $nome = array('id' => 'nomeFederado', 'name' => 'nomeFederado', 'maxlength' => '60', 'size' => '50', 'readonly' => 'readonly', 'class' => 'span3');
    echo form_label("Federado", "nomeFederado");
    echo form_input($nome);

    $data = array('id' => 'dataNasc', 'name' => 'dataNasc', 'maxlength' => '10', 'size' => '10', 'readonly' => 'readonly');
    echo form_label("Data de nascimento", "dataNasc");
    echo form_input($data);

    $idade = array('id' => 'idade', 'name' => 'idade', 'maxlength' => '3', 'size' => '3', 'readonly' => 'readonly', 'class' => 'input-mini');
    echo form_label("Idade", 'idade');
    echo form_input($idade);

    $telefone = array('id' => 'telefone', 'name' => 'telefone', 'maxlength' => '13', 'size' => '13', 'readonly' => 'readonly');
    echo form_label("Telefone", "telefone");
    echo form_input($telefone);

    $email = array('id' => 'email', 'name' => 'email', 'maxlength' => '50', 'size' => '50', 'readonly' => 'readonly', 'class' => 'span3');
    echo form_label("E-mail", "email");
    echo form_input($email);

    $celular = array('id' => 'celular', 'name' => 'celular', 'maxlength' => '14', 'size' => '14', 'readonly' => 'readonly');
    echo form_label("Celular", "celular");
    echo form_input($celular);

    $sexo = array('id' => 'sexo', 'name' => 'sexo', 'maxlength' => '1', 'size' => '2', 'readonly' => 'readonly', 'class' => 'input-mini');
    echo form_label("Sexo", "sexo");
    echo form_input($sexo);

    $escolaridade = array('id' => 'escolaridade', 'name' => 'escolaridade', 'maxlength' => '30', 'size' => '30', 'readonly' => 'readonly', 'class' => 'span3');
    echo form_label("Escolaridade", 'escolaridade');
    echo form_input($escolaridade);

    $nacionalidade = array('id' => 'nacionalidade', 'name' => 'nacionalidade', 'maxlength' => '30', 'size' => '30', 'readonly' => 'readonly', 'class' => 'span3');
    echo form_label("Nacionalidade", "nacionalidade");
    echo form_input($nacionalidade);

    $faixa = array('id' => 'faixa', 'name' => 'faixa', 'maxlength' => '30', 'size' => '30', 'readonly' => 'readonly', 'class' => 'span3');
    echo form_label("Graduação atual", "faixa");
    echo form_input($faixa);
    echo br();
    echo anchor("", "Imprimir Federado", array('class' => 'btn btn-primary', 'id' => 'imprimir'));
    echo nbs(4);
    echo anchor("", "Alterar informações", array('class' => 'btn btn-primary', 'id' => 'alterar'));

    echo form_fieldset_close();
    ?>
</div>