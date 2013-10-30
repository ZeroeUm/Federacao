<style>
    .controls{
        max-width: 300px;
    }
    
</style>
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
<span class="obrigatorio" style="float: right;font-size: 12px">* campos obrigatórios</span>

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
            $inNome = 'id="nome" class="input-block-level" maxlength="60" required placeholder="Nome Completo"';
            echo form_input('nome', set_value('nome'), $inNome);
            ?>
             <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Filiação Materna", "fMaterna", $label);
        ?>
        <div class="controls">
            <?php
            $inFMaterna = 'id="fMaterna" class="input-block-level" maxlength="60" placeholder="Filiação Materna"';
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
            $inFPaterna = 'id="fPaterna" class="input-block-level" maxlength="60" placeholder="Filiação Paterna"';
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
            echo form_dropdown("sexo", $opSexo, set_value("sexo", "#"), 'id="sexo" class="input-block-level" required');
            ?>
            
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Data de nascimento", "dtNasc", $label);
        ?>
        <div class="controls">
            <?php
            $inData = 'id="dtNasc" class="input-block-level" maxlength="10" required placeholder="Data de nascimento"';
            echo form_input("dtNasc", set_value('dtNasc'), $inData);
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("RG", "rg", $label);
        ?>
        <div class="controls">
            <?php
            $inRg = 'id="rg" class="input-block-level" maxlength="12" required placeholder="RG"';
            echo form_input("rg", set_value('rg'), $inRg);
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Telefone", "telefone", $label);
        ?>
        <div class="controls">
            <?php
            $inTelefone = 'id="telefone" class="input-block-level" maxlength="13" required placeholder="Telefone"';
            echo form_input("telefone", set_value('telefone'), $inTelefone);
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Celular", "celular", $label);
        ?>
        <div class="controls">
            <?php
            $inCelular = 'id="celular" class="input-block-level" maxlength="14" placeholder="Celular"';
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
            $inEmail = 'id="email" class="input-block-level" maxlength="50" required placeholder="E-mail"';
            echo form_input("email", set_value('email'), $inEmail);
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Foto de identificação", "foto", $label);
        ?>
        <div class="controls">
            <?php
            $inFoto = 'id="foto" class="input-block-level"';
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
            echo form_dropdown("escolaridade", $opEscolaridade, set_value('escolaridade', '#'), 'id="sexo" class="input-block-level" required')
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
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
            echo form_dropdown('tamanhoFaixa',$opTamanho,  set_value('tamanhoFaixa','#'),'id="tamanhoFaixa" class="input-block-level" required');
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
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

            echo form_dropdown('nacionalidade', $opNacionalidade, set_value('nacionalidade', '#'), 'id="nacionalidade" class="input-block-level" required');
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
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
            echo form_dropdown('tipo', $opTipo, set_value('tipo', "#"), 'id="tipo" class="input-block-level" required');
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
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
            echo form_dropdown('modalidade',$opModalidade,1,'id="modalidade" class="input-block-level" required disabled');
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
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
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Logradouro", "logradouro", $label);
        ?>
        <div class="controls">
            <?php
            $inLogradouro = 'id="logradouro" class="input-block-level" maxlength="80" required placeholder="Logradouro"';
            echo form_input('logradouro', set_value('logradouro'), $inLogradouro);
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Número", "numero", $label);
        ?>
        <div class="controls">
            <?php
            $inNumero = 'id="numero" class="input-block-level" maxlength="5" required placeholder="Número"';
            echo form_input('numero', set_value('numero'), $inNumero);
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Complemento", "compl", $label);
        ?>
        <div class="controls">
            <?php
            $inComplemento = 'id="compl" class="input-block-level" maxlength="20" placeholder="Complemento"';
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
            $inBairro = 'id="bairro" class="input-block-level" maxlength="30" required placeholder="Bairro"';
            echo form_input("bairro", set_value('bairro'), $inBairro);
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <div class="control-group">
        <?php
        echo form_label("Cidade", "cidade", $label);
        ?>
        <div class="controls">
            <?php
            $inCidade = 'id="cidade" class="input-block-level" maxlength="30" required placeholder="Cidade"';
            echo form_input("cidade", set_value('cidade'), $inCidade);
            ?><i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
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
            echo form_dropdown('uf', $opUF, set_value('uf', "#"), 'id="uf" class="input-block-level" required');
            ?> <i class="obrigatorio" style="float: right;position: absolute;margin-left: 300px;margin-top: -20px;" >*</i>
        </div>
    </div>
    <?php
    $inBotao = 'id="btnIncluir" class="btn btn-success"';
    echo form_submit("btnIncluir", "Incluir informações", $inBotao);
    echo form_close();
    echo form_fieldset_close();
    ?>
</div>