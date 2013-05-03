<script type="text/javascript" src="<?php echo base_url()?>assets/js/incluirFederado.js"></script>
<script type="text/javascript">
    $(function () {
        $("#dtNasc").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy",
            showAnim: "fadeIn",
            showOtherMonths: true,
            selectOtherMonths: true
        })
    })
</script>
<?php
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
    echo form_fieldset("Incluir novo federado");
    echo form_open_multipart("administrador/incluirFederado", $attr);
    ?>
    <div class="control-group">
        <?php
        echo form_label("Nome Completo", "nome", $label);
        ?>
        <div class="controls">
            <?php
            $inNome = 'id="nome" class="span3" maxlength="60" required placeholder="Nome Completo"';
            echo form_input('nome', set_value('nome'), $inNome);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Filiação Materna", "fMaterna", $label);
        ?>
        <div class="controls">
            <?php
            $inFMaterna = 'id="fMaterna" class="span3" maxlength="60" placeholder="Filiação Materna"';
            echo form_input('fMaterna', set_value('fMaterna'), $inFMaterna);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Filiação Paterna", "fPaterna", $label);
        ?>
        <div class="controls">
            <?php
            $inFPaterna = 'id="fPaterna" class="span3" maxlength="60" placeholder="Filiação Paterna"';
            echo form_input("fPaterna", set_value('fPaterna'), $inFPaterna);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Sexo", "sexo", $label);
        ?>
        <div class="controls">
            <?php
            $opSexo = array("#" => "Escolha uma opção.", "F" => "Feminino", "M" => "Masculino");
            echo form_dropdown("sexo", $opSexo, set_value("sexo", "#"), 'id="sexo" class="span3" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Data de nascimento", "dtNasc", $label);
        ?>
        <div class="controls">
            <?php
            $inData = 'id="dtNasc" class="span2" maxlength="10" required placeholder="Data de nascimento"';
            echo form_input("dtNasc", set_value('dtNasc'), $inData);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("RG", "rg", $label);
        ?>
        <div class="controls">
            <?php
            $inRg = 'id="rg" class="span2" maxlength="12" required placeholder="RG"';
            echo form_input("rg", set_value('rg'), $inRg);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Telefone", "telefone", $label);
        ?>
        <div class="controls">
            <?php
            $inTelefone = 'id="telefone" class="span2" maxlength="13" required placeholder="Telefone"';
            echo form_input("telefone", set_value('telefone'), $inTelefone);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Celular", "celular", $label);
        ?>
        <div class="controls">
            <?php
            $inCelular = 'id="celular" class="span2" maxlength="14" placeholder="Celular"';
            echo form_input("celular", set_value('celular'), $inCelular);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("E-mail", "email", $label);
        ?>
        <div class="controls">
            <?php
            $inEmail = 'id="email" class="span3" maxlength="50" required placeholder="E-mail"';
            echo form_input("email", set_value('email'), $inEmail);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Foto de identificação", "foto", $label);
        ?>
        <div class="controls">
            <?php
            $inFoto = 'id="foto" class="span3"';
            echo form_upload("foto", set_value("foto"), $inFoto);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Escolaridade", "escolaridade", $label);
        ?>
        <div class="controls">
            <?php
            $opEscolaridade["#"] = "Escolha uma opção.";
            foreach ($escolaridade as $esc)
                $opEscolaridade[$esc['id']] = $esc['descricao'];
            echo form_dropdown("escolaridade", $opEscolaridade, set_value('escolaridade', '#'), 'id="sexo" class="span3" required')
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label('Tamanho da faixa','tamanhoFaixa',$label);
        ?>
        <div class="controls">
            <?php
            $opTamanho['#'] = "Escolha um tamanho";
            $opTamanho['P'] = "Pequeno";
            $opTamanho['M'] = "Médio";
            $opTamanho['G'] = "Grande";
            $opTamanho['GG'] = "Extra-grande";
            echo form_dropdown('tamanhoFaixa',$opTamanho,  set_value('tamanhoFaixa','#'),'id="tamanhoFaixa" class="span3" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Nacionalidade", "nacionalidade", $label);
        ?>
        <div class="controls">
            <?php
            $opNacionalidade["#"] = "Escolha uma opção.";
            foreach ($nacionalidade as $nac)
                $opNacionalidade[$nac['id']] = $nac['nacionalidade'];

            echo form_dropdown('nacionalidade', $opNacionalidade, set_value('nacionalidade', '#'), 'id="nacionalidade" class="span3" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Tipo de federado", "tipo", $label);
        ?>
        <div class="controls">
            <?php
            $opTipo["#"] = "Escolha uma opção.";
            foreach ($tipo as $t)
                $opTipo[$t['id']] = $t['tipo'];
            echo form_dropdown('tipo', $opTipo, set_value('tipo', "#"), 'id="tipo" class="span3" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
            echo form_label('Modalidade', 'modalidade',$label);
        ?>
        <div class="controls">
            <?php
            foreach ($modalidade as $mod)
                $opModalidade[$mod['id']] = $mod['nome'];
            echo form_dropdown('modalidade',$opModalidade,1,'id="modalidade" class="span3" required disabled');
            ?>
        </div>
    </div>
        <div class="control-group">
        <?php
            echo form_label('Filial','filial',$label);
        ?>
        <div class="controls">
            <?php
            $opFilial['#'] = "Escolha uma filial";
            foreach ($filial as $f)
                $opFilial[$f['id']] = $f['nome'];
            echo form_dropdown('filial',$opFilial,set_value('filial',"#"),'id="filial" class="span4" required');
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Logradouro", "logradouro", $label);
        ?>
        <div class="controls">
            <?php
            $inLogradouro = 'id="logradouro" class="span3" maxlength="80" required placeholder="Logradouro"';
            echo form_input('logradouro', set_value('logradouro'), $inLogradouro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Número", "numero", $label);
        ?>
        <div class="controls">
            <?php
            $inNumero = 'id="numero" class="span2" maxlength="5" required placeholder="Número"';
            echo form_input('numero', set_value('numero'), $inNumero);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Complemento", "compl", $label);
        ?>
        <div class="controls">
            <?php
            $inComplemento = 'id="compl" class="span3" maxlength="20" placeholder="Complemento"';
            echo form_input('compl', set_value('compl'), $inComplemento);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Bairro", "bairro", $label);
        ?>
        <div class="controls">
            <?php
            $inBairro = 'id="bairro" class="span3" maxlength="30" required placeholder="Bairro"';
            echo form_input("bairro", set_value('bairro'), $inBairro);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Cidade", "cidade", $label);
        ?>
        <div class="controls">
            <?php
            $inCidade = 'id="cidade" class="span3" maxlength="30" required placeholder="Cidade"';
            echo form_input("cidade", set_value('cidade'), $inCidade);
            ?>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("UF", "uf", $label);
        ?>
        <div class="controls">
            <?php
            $opUF["#"] = "Escolha uma opção.";
            foreach ($uf as $estado)
                $opUF[$estado['id']] = $estado['sigla'];
            echo form_dropdown('uf', $opUF, set_value('uf', "#"), 'id="uf" class="span2" required');
            ?>
        </div>
    </div>
    <?php
    $inBotao = 'id="btnIncluir" class="btn btn-primary"';
    echo form_submit("btnIncluir", "Incluir informações", $inBotao);
    echo form_close();
    echo form_fieldset_close();
    ?>
</div>