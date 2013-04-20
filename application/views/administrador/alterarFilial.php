<?php
/*
 * 2013-01-26
 *  @author Humberto
 */
$filial = $filial[0];
$endereco = $endereco[0];

$hidden = array("filial" => $filial['id_filial'], "endereco" => $endereco["id_endereco"]);
$attr = array(
    "class" => "form-horizontal",
    "id" => "frmAlterar",
    "nome" => "frmAlterar"
);
$label = array(
    "class" => "control-label"
);
?>
<div class="row-fluid">
    <div class="alert-error">
        <?php echo validation_errors(); ?>    
    </div>
    <?php
    echo form_fieldset("Alteração de registro de filial");
    echo form_open("administrador/alterarFilial/" . $this->uri->segment(3), $attr, $hidden);
    ?>
    <div class="control-group">
        <?php echo form_label("Nome Filial", "nome", $label) ?>
        <div class="controls">
            <?php
            $inNome = "id='nome' class='span3' maxlength='60' required";
            echo form_input('nome', set_value("nome", $filial['nome']), $inNome);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("CNPJ", "cnpj", $label) ?>
        <div class="controls">
            <?php
            $inCNPJ = "id='cnpj' class='span3' maxlength='19' required";
            echo form_input('cnpj', set_value("cnpj", $filial['cnpj']), $inCNPJ);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Telefone", "telefone", $label) ?>
        <div class="controls">
            <?php
            $inTelefone = "id='telefone' class='span2' maxlegth='13'";
            echo form_input('telefone', set_value("telefone", $filial['telefone']), $inTelefone);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Fax", "fax", $label) ?>
        <div class="controls">
            <?php
            $inCelular = "id='fax' class='span2' maxlength='13'";
            echo form_input('fax', set_value("fax", $filial['fax']), $inCelular);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("E-mail", 'email', $label) ?>
        <div class="controls">
            <?php
            $inEmail = "id='email' class='span2' maxlength='50' required";
            echo form_input('email', set_value("email", $filial['email']), $inEmail);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Representante", "representante", $label) ?>
        <div class="controls">
            <?php
            $inRepresentante = "id='representante' class='span3' maxlength='60'";
            echo form_input('representante', set_value("representante", $filial['representante']), $inRepresentante);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Modalidade", "modalidade", $label) ?>
        <div class="controls">
            <?php
            $inModalidade = 'id="modalidade" class="span2" disabled';
            foreach ($modalidade as $mod)
                $opModalidade[$mod['id']] = $mod['nome'];
            echo form_dropdown('modalidade', $opModalidade, $filial['id_modalidade'], $inModalidade);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Instrutor", "instrutor", $label) ?>
        <div class="controls">
            <?php
            $inInstrutor = "id='instrutor' class='span3'";
            foreach ($instrutor as $ins)
                $opInstrutor[$ins['id']] = $ins['nome'];
            echo form_dropdown('instrutor', $opInstrutor, set_value("instrutor", $filial['id_instrutor']), $inInstrutor);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Logradouro", "logradouro", $label) ?>
        <div class="controls">
            <?php
            $inLogradouro = "id='logradouro' class='span3' maxlength='80' required";
            echo form_input('logradouro', set_value("logradouro", $endereco['logradouro']), $inLogradouro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Número", "numero", $label) ?>
        <div class="controls">
            <?php
            $inNumero = "id='numero' class='span2' maxlength='5' required";
            echo form_input('numero', set_value("numero", $endereco['numero']), $inNumero);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Complemento", "compl", $label) ?>
        <div class="controls">
            <?php
            $inCompl = "id='compl' class='span2' maxlength='20'";
            echo form_input('compl', set_value("compl", $endereco['complemento']), $inCompl);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Bairro", "bairro", $label) ?>
        <div class="controls">
            <?php
            $inBairro = "id='bairro' class='span3' maxlength='30' required";
            echo form_input('bairro', set_value("bairro", $endereco['bairro']), $inBairro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("Cidade", 'cidade', $label) ?>
        <div class="controls">
            <?php
            $inCidade = "id='cidade' class='span3' maxlength='30' required";
            echo form_input('cidade', set_value("cidade", $endereco['cidade']), $inCidade);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php echo form_label("UF", 'uf', $label) ?>
        <div class="controls">
            <?php
            $inUF = "id='uf' class='span1' required";
            foreach ($uf as $estado)
                $opUF[$estado['id']] = $estado['sigla'];
            echo form_dropdown('uf', $opUF, set_value("uf", $endereco['uf']), $inUF);
            ?>
        </div>
    </div>
    <?php
    $inBotao = 'id="btnAlterar" class="btn btn-primary"';
    echo form_submit("btnAlterar", "Alterar informações", $inBotao);
    echo form_close();
    echo form_fieldset_close();
    ?>
</div>