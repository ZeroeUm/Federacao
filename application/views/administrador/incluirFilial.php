<?php
/*
 * 2013-01-26
 * @author Humberto
 */
$attr = array(
    "class" => "form-horizontal",
    "id" => "frmAlterar",
    "nome" => "frmAlterar"
);
$label = array(
    "class" => "control-label"
);
?>
<div id="row-fluid">
    <div class="alert-error">
        <?php echo validation_errors(); ?>    
    </div>
</div>
<div id="row-fluid">
    <?php
    echo form_fieldset("Inclusão de nova filial");
    echo form_open("administrador/incluirFilial", $attr);
    ?>
    <div class="control-group">
        <?php echo form_label("Nome Filial", "nome", $label) ?>
        <div class="controls">
            <?php
            $inNome = "id='nome' class='span3' maxlength='60' required placeholder='Nome da filial'";
            echo form_input('nome', set_value("nome"), $inNome);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("CNPJ", "cnpj", $label) ?>
        <div class="controls">
            <?php
            $inCNPJ = "id='cnpj' class='span2' maxlength='19' required placeholder='CNPJ'";
            echo form_input('cnpj', set_value("cnpj"), $inCNPJ);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Telefone", "telefone", $label) ?>
        <div class="controls">
            <?php
            $inTelefone = "id='telefone' class='span2' maxlegth='13' placeholder='Telefone'";
            echo form_input('telefone', set_value("telefone"), $inTelefone);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Fax", "fax", $label) ?>
        <div class="controls">
            <?php
            $inCelular = "id='fax' class='span2' maxlength='13' placeholder='Celular'";
            echo form_input('fax', set_value("celular"), $inCelular);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("E-mail", 'email', $label) ?>
        <div class="controls">
            <?php
            $inEmail = "id='email' class='span2' maxlength='50' required placeholder='E-mail'";
            echo form_input('email', set_value("email"), $inEmail);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Representante", "representante", $label) ?>
        <div class="controls">
            <?php
            $inRepresentante = "id='representante' class='span3' maxlength='60' placeholder='Representante'";
            echo form_input('representante', set_value("representante"), $inRepresentante);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Modalidade", "modalidade", $label) ?>
        <div class="controls">
            <?php
            $inModalidade = "id='modalidade class='span2' required disabled";
            foreach ($modalidade as $mod)
                $opModalidade[$mod['id']] = $mod['nome'];
            echo form_dropdown('modalidade', $opModalidade, 1, $inModalidade);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Instrutor", "instrutor", $label) ?>
        <div class="controls">
            <?php
            $inInstrutor = "id='instrutor' class='span3' required";
            $opInstrutor["#"] = "Escolha uma opção.";
            foreach ($instrutores as $instrutor)
                $opInstrutor[$instrutor['id']] = $instrutor['nome'];
            echo form_dropdown('instrutor', $opInstrutor, set_value("instrutor", "#"), $inInstrutor);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Logradouro", "logradouro", $label) ?>
        <div class="controls">
            <?php
            $inLogradouro = "id='logradouro' class='span3' maxlength='80' required placeholder='Logradouro'";
            echo form_input('logradouro', set_value("logradouro"), $inLogradouro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Número", "numero", $label) ?>
        <div class="controls">
            <?php
            $inNumero = "id='numero' class='span2' maxlength='5' required placeholder='Número'";
            echo form_input('numero', set_value("numero"), $inNumero);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Complemento", "compl", $label) ?>
        <div class="controls">
            <?php
            $inCompl = "id='compl' class='span2' maxlength='20' placeholder='Complemento'";
            echo form_input('compl', set_value("compl"), $inCompl);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Bairro", "bairro", $label) ?>
        <div class="controls">
            <?php
            $inBairro = "id='bairro' class='span3' maxlength='30' required placeholder='Bairro'";
            echo form_input('bairro', set_value("bairro"), $inBairro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Cidade", 'cidade', $label) ?>
        <div class="controls">
            <?php
            $inCidade = "id='cidade' class='span3' maxlength='30' required placeholder='Cidade'";
            echo form_input('cidade', set_value("cidade"), $inCidade);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("UF", 'uf', $label) ?>
        <div class="controls">
            <?php
            $inUF = "id='uf' class='span3' required";
            $opUF["#"] = "Escolha uma opção.";
            foreach ($uf as $estado)
                $opUF[$estado['id']] = $estado['sigla'];
            echo form_dropdown('uf', $opUF, set_value("uf", "#"), $inUF);
            ?>
        </div>
    </div>
    <?php
    $inBotao = 'id="btnIncluir" class="btn"';
    echo form_submit("btnIncluir", "Incluir informações", $inBotao);
    echo form_close();
    echo form_fieldset_close();
    ?>
</div>